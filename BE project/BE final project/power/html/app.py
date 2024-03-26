from flask import Flask, render_template, session, request, redirect, url_for, send_file
import mysql.connector
import os, csv

connection = mysql.connector.connect(
    host="localhost", user="root", password="", database="power"
)
app = Flask(__name__)
app.secret_key = "123"


# Route for rendering the index.html template
@app.route("/")
def index():
    return render_template("index.html")


@app.route("/ImportantNotifications.html")
def ImportantNotifications():
    return render_template("ImportantNotifications.html")


@app.route("/SignUp.html")
def SignUp():
    return render_template("SignUp.html")


@app.route("/Contact.html")
def Contact():
    return render_template("Contact.html")


@app.route("/About.html")
def About():
    return render_template("About.html")


@app.route("/customerlogin.html", methods=["GET", "POST"])
def customerlogin():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]

        cursor = connection.cursor()

        # Insert data into the database
        try:
            cursor.execute(
                "INSERT INTO userlogin (username, password) VALUES (%s, %s)",
                (username, password),
            )
            connection.commit()
            return redirect(url_for("userlogin"))
        except mysql.connector.Error as error:
            return redirect(url_for("try_again"))
    else:
        return render_template("customerlogin.html")


# Route for success message
@app.route("/success")
def success():
    return "<script>alert('Successfully Done!!!');window.location.href = '{{ url_for('userlogin') }}';</script>"


# Route for failure message
@app.route("/try_again")
def try_again():
    return "<script>alert('Try Again !!!');window.location.href = '{{ url_for('newlogin') }}';</script>"


@app.route("/EmployeeLogin.html", methods=["GET", "POST"])
def EmployeeLogin():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]

        cursor = connection.cursor()

        # Check if username and password are not empty
        if username != "" and password != "":
            # Execute SQL query to verify credentials
            sql_query = f"SELECT COUNT(*) AS cntUser FROM admin WHERE username = '{username}' AND password = '{password}'"
            cursor.execute(sql_query)
            row = cursor.fetchone()
            count = row[0]

            # If credentials are correct, create session and redirect to admindashboard
            if count > 0:
                session["uname"] = username
                return redirect(url_for("admindashboard"))
            else:
                return "Invalid username and password"
    else:
        return render_template("EmployeeLogin.html")


@app.route("/userlogin.html", methods=["GET", "POST"])
def userlogin():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]

        cursor = connection.cursor()

        # Check if username and password are not empty
        if username != "" and password != "":
            # Execute SQL query to verify credentials
            sql_query = f"SELECT COUNT(*) AS cntUser FROM userlogin WHERE username = '{username}' AND password = '{password}'"
            cursor.execute(sql_query)
            row = cursor.fetchone()
            count = row[0]

            # If credentials are correct, create session and redirect to adduser page
            if count > 0:
                session["uname"] = username
                print(session["uname"])
                return redirect(url_for("adduser"))
            else:
                return "Invalid username and password"
        else:
            render_template("userlogin.html")
    else:

        return render_template("userlogin.html")


@app.route("/adduser.html", methods=["GET", "POST"])
def adduser():
    if request.method == "POST":
        name = request.form["name"]
        address = request.form["address"]
        email = request.form["email"]
        phone = request.form["phone"]
        username = session.get("uname")
        print(username)
        cursor = connection.cursor()

        # Retrieve user ID based on username
        sql1 = f"SELECT id FROM userlogin WHERE username = '{username}'"
        cursor.execute(sql1)
        row = cursor.fetchone()
        user_id = row[0]

        # Upload and store the PDF file
        pdf = request.files["electricity_bill"]
        pdfFileName = pdf.filename
        pdfPath = os.path.join("uploads", pdfFileName)
        pdf.save(pdfPath)

        # Insert data into the database
        sql = "INSERT INTO userdetail (name, address, email, phno, doc, userlogin_id) VALUES (%s, %s, %s, %s, %s, %s)"
        values = (name, address, email, phone, pdfPath, user_id)

        try:
            cursor.execute(sql, values)
            connection.commit()
            return redirect(url_for("success1"))
        except mysql.connector.Error as error:
            return render_template("adduser.html")
    else:
        return render_template("adduser.html")


@app.route("/admindashboard.html")
def admindashboard():
    return render_template("admindashboard.html")


@app.route("/newlogin.html")
def newlogin():
    return render_template("newlogin.html")


@app.route("/success.html")
def success1():
    return render_template("success.html")


@app.route("/viewuser.html/<int:user_id>", methods=["GET"])
def index1(user_id):
    try:
        with open(
            "C:/Users/khand/Downloads/proj update/power/html/SampleDataset.csv", "r"
        ) as file:
            csv_reader = csv.reader(file)
            dtc_name = request.args.get("dtc_name")

            for row in csv_reader:
                if row[0] == str(user_id) and row[2] == dtc_name:
                    # Extract data from the CSV row
                    region = row[1]
                    subd = row[5]
                    feednm = row[10]
                    no_of_poles_from_stn = row[14]
                    no_of_poles_from_node = row[16]
                    latitude = row[25]
                    longitude = row[26]

                    return render_template(
                        "viewuser.html",
                        dtc_name=dtc_name,
                        region=region,
                        subd=subd,
                        feednm=feednm,
                        no_of_poles_from_stn=no_of_poles_from_stn,
                        no_of_poles_from_node=no_of_poles_from_node,
                        latitude=latitude,
                        longitude=longitude,
                    )
            else:
                return render_template("viewuser.html", dtc_name=dtc_name, error=True)
    except Exception as e:
        return str(e)


@app.route("/download/<filename>")
def download_file(filename):
    # Define the path to the directory containing the document files
    doc_directory = "C:/Users/khand/Downloads/proj update-1/power/html/"

    # Construct the full path to the requested file
    file_path = os.path.join(doc_directory, filename)

    # Check if the file exists
    if os.path.isfile(file_path):
        # Serve the file for download
        print(file_path)
        return send_file(file_path, as_attachment=True)
    else:
        return "File not found", 404


@app.route("/viewuser.html")
def viewuser():
    cursor = connection.cursor(dictionary=True)
    query = "SELECT * FROM userdetail"
    cursor.execute(query)
    users = cursor.fetchall()
    return render_template("viewuser.html", users=users)


if __name__ == "__main__":
    app.run(debug=True)

import smtplib, ssl
port = 465
context = ssl.create_default_context()

with smtplib.SMTP_SSL("smtp.gmail.com", port, context=context) as server:
    server.login("mesto1830@gmail.com", 'mk1972mk')
    server.sendmail("mesto1830@gmail.com", 'mesto1830@outlook.com', 'Hello')
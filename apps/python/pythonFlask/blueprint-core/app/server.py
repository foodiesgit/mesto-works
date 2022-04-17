from flask import Flask, render_template
app = Flask(__name__)

from .views.home import home
from .views.login import login


app.register_blueprint(home)
app.register_blueprint(login, url_prefix='/')


if __name__ == '__main__':
  app.run(debug=True)
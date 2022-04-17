from flask import Blueprint, render_template, session, redirect

admin = Blueprint('admin', __name__)


@admin.route('/admin')
def admin_home():
  if session:
    return render_template('admin.html', title='Admin', session=session)
  else:
    return redirect('login')
from flask import Flask,render_template,request
import smtplib
app=Flask(__name__)
global blogTitle,blogAuthor,blogText
lists=[]
blogs=[]
d1={
    "blogid":0,
    "blogTitle":"6 Types of Summer Jobs for College Students (With Examples)",
    "blogAuthor":"Ransom Patterson",
    "blogText":"Summer jobs for college students have certainly come a long way. In the digital era, you have far more          options than flipping burgers or lifeguarding at the local pool. Still, it can be a struggle to find a job.Where do you start?"
}
d2={
    "blogid":1,
    "blogTitle":"The 5 Best Website Builders in 2022 – Elementor, Webflow, and More",
    "blogAuthor":"Ransom Patterson",
    "blogText":"Making a website used to require a lot of time and technical skill. These days, however, we have website builders that let you create a site in a few hours — no coding required.Still, there are a lot of options when it comes to choosing a website builder. And not all website builders are created equal.To help you find the right option for your needs, we’ve created this guide to the best website builders in 2022. Whether you’re looking to create a portfolio, blog, or online store, there’s a tool for you on this list (no matter your budget)."

}
blogs.append(d1)
blogs.append(d2)
my_email="nehachikki2@gmail.com"
my_pwd="chikki*234"
@app.route("/")
def toCreate():
    return render_template("create_blog.html")

@app.route ("/admin",methods=["POST"])
def toAdmin():
    blogTitle=request.form["blogTitle"]
    blogAuthor=request.form["blogAuthor"]
    blogText=request.form["blogText"]
    d={
        "blogid":len(blogs)+1,
        "blogTitle":blogTitle,
        "blogAuthor":blogAuthor,
        "blogText":blogText,
    }
    lists.append(d)
    return render_template("trending_blogs.html",blogs=blogs)

@app.route("/secret")
def secret():
    return render_template("admin.html",lists=lists)

@app.route("/accepted",methods=["POST"])
def accepted():
    number=request.form["number"]
    if request.form["number1"] =="accept":
        blogs.append(lists[int(number)])
        del lists[int(number)]
        with smtplib.SMTP("smtp.gmail.com") as connection:
            connection.starttls()
            connection.login(my_email, my_pwd)
            connection.sendmail(from_addr=my_email,to_addrs="alwalsowmika@gmail.com",msg=f'Subject:Congratulations on making it!!!\n Your blog is live \n Regards\n Team Euphoria')
        return render_template("admin.html", lists=lists)
    elif request.form["number1"]== "reject":
        del lists[int(number)]
        with smtplib.SMTP("smtp.gmail.com") as connection:
            connection.starttls()
            connection.login(my_email, my_pwd)
            connection.sendmail(from_addr=my_email,to_addrs="alwalsowmika@gmail.com",msg=f'Subject:Sorry the content in your blog is not according to our rules.\n Please make the neccessary changes and try posting again. \n Regards\n Team Euphoria')

        return render_template("admin.html", lists=lists)
    else:
        return '<h1>Not Successful</h1>'







@app.route('/blogspresent')
def hello():
    return render_template("trending_blogs.html",blogs=blogs)


@app.route("/post/<int:index>")
def show_post(index):
    requested_post=blogs[index]
    return render_template("post.html", post=requested_post)



if __name__=="__main__":
    app.run(debug=True)

import urllib.request

url1 = "https://www.nature.com/immersive/d41586-021-00095-y/assets/XeyZZ5YxC0/2021-01-xx_jan-iom_taal_sh-1533x1024.jpeg"
url2 = "https://media3.s-nbcnews.com/j/newscms/2019_41/3047866/191010-japan-stalker-mc-1121_06b4c20bbf96a51dc8663f334404a899.fit-2000w.JPG"
url3 = "https://media.gettyimages.com/photos/-picture-id983337840?s=2048x2048"
imgurls = [url1,url2,url3]
number = 1
for item in imgurls:
  urllib.request.urlretrieve(item, "img" + str(number) + ".jpg")
  number+=1
    
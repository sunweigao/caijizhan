#!D:\Python\python.exe
# -*- coding: UTF-8 -*-

print
import urllib
import urllib2
import re
from db import *
# CGI处理模块
import cgi, cgitb 

# 创建 FieldStorage 的实例化
form = cgi.FieldStorage() 

class Cate:

    #init
    def __init__(self):
        # 获取数据
        self.site_id = form.getvalue('id')
        site_url = form.getvalue('path')
        self.url = "http://www.jokeji.cn"+site_url

    def getPage(self):
        url = self.url
        request = urllib2.Request(url)
        response = urllib2.urlopen(request)
        return response.read()

    def getDiv(self):
        getPage = self.getPage()
        print getPage
        divContent = re.compile('(<div class="list_title".*?)<div class="list_ad600">', re.S)
        title = re.search(divContent,getPage)
      	print title.group(1)

    #获取分类内容 并入库
    def getCate(self):
    	cate_id = self.site_id
    	getDiv = self.getDiv()
        cateContent = re.compile('<b><a href="(.*?)".*?>(.*?)</a></b>', re.S)
        cate = re.findall(cateContent,getDiv)
        print cate
        # str1 = ''
        # for item in cate:
        #     url = item[0]
        #     name = item[1].decode('gb2312')
        #     str = '("'+url+'","'+name+'","'+cate_id+'"),'
        #     str1 += str
        # navstr = str1[:-1]
        # #入库
        # sql = 'insert into cate2(url,name,category_id) values'+navstr
        # try:
        #     # 执行sql语句
        #     cursor.execute(sql)
        #     # 提交到数据库执行
        #     db.commit()
        # except:
        #     # Rollback in case there is any error
        #     db.rollback()
       

Cate = Cate()
#Cate.getCate()
Cate.getDiv()

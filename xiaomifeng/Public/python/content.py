#!D:\Python\python.exe
# -*- coding: UTF-8 -*-

print
import urllib
import urllib2
import re
from db import *
import cgi, cgitb 
import time

# 创建 FieldStorage 的实例化
form = cgi.FieldStorage() 

class Content:

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
		divContent = re.compile('(<span id="text110".*?</span>)', re.S)
		title = re.search(divContent,getPage)
		return title.group(1)

	#获取分类内容 并入库
	def getCate(self):
		add_time = time.strftime('%Y-%m-%d',time.localtime(time.time()))
		cate_id = self.site_id
		getDiv = self.getDiv()
		cateContent = re.compile('<P>(.*?)</P>', re.S)
		content = re.findall(cateContent,getDiv)
		str1 = ''
		for item in content:
			content = item.decode('gb2312')
			str = '("'+content+'","'+cate_id+'","'+add_time+'"),'
			str1 += str
		navstr = str1[:-1]
		#入库
		sql = 'insert into joke(content,cate_id,add_time) values'+navstr
		try:
			# 执行sql语句
			cursor.execute(sql)
			# 提交到数据库执行
			db.commit()
		except:
			# Rollback in case there is any error
			db.rollback()

Content = Content()
print Content.getCate()

# import time
# print time.time()
# 输出的结果是：
# 1279578704.6725271

# 但是这样是一连串的数字不是我们想要的结果，我们可以利用time模块的格式化时间的方法来处理：
# time.localtime(time.time())
# 用time.localtime()方法，作用是格式化时间戳为本地的时间。
# 输出的结果是：
# time.struct_time(tm_year=2010, tm_mon=7, tm_mday=19, tm_hour=22, tm_min=33, tm_sec=39, tm_wday=0, tm_yday=200, tm_isdst=0)

# 现在看起来更有希望格式成我们想要的时间了。
# time.strftime('%Y-%m-%d',time.localtime(time.time()))

# 最后用time.strftime()方法，把刚才的一大串信息格式化成我们想要的东西，现在的结果是：
# 2010-07-19
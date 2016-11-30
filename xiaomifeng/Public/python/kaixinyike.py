#!D:\Python\python.exe
# -*- coding: UTF-8 -*-

print
import urllib
import urllib2
import re
from db import *
from cate import *

class kaixinyike:

	#init
	def __init__(self):
		self.url = "http://www.jokeji.cn"
		self.url2 = "http://www.jokeji.cn"
	#convert span to ''
	def spanFilter(self, x):
		pattern = re.compile('<div.*?<a href="')
		img = re.compile('</a.*?<a href="')
		em = re.compile('<em.*?')
		res = re.sub(em,'',re.sub(img,'',re.sub(pattern, '', x)))
		return res

	#获取页面
	def getPage(self):
		url = self.url
		request = urllib2.Request(url)
		response = urllib2.urlopen(request)
		return response.read()
	#定位div
	def getDiv(self):
		getPage = self.getPage()
		divContent = re.compile('(<div class="joketype l_left".*?)<div class="rightbody l_right">', re.S)
		title = re.search(divContent,getPage)
		return title.group(1)
	#获取分类内容 并入库
	def getCate(self):
		getDiv = self.getDiv()
		cateContent = re.compile('<a href="(.*?)">(.*?)</a>', re.S)
		cate = re.findall(cateContent,getDiv)
		str1=''
		for item in cate:
			url = item[0]

			name = item[1].decode('gb2312')
			str = '("'+url+'","'+name+'"),'
			str1 += str
		navstr = str1[:-1]
		#入库
		sql = 'insert into category(url,name) values'+navstr
		try:
			# 执行sql语句
			cursor.execute(sql)
			# 提交到数据库执行
			db.commit()
		except:
			# Rollback in case there is any error
			db.rollback()


kaixin = kaixinyike()
kaixin.getCate()

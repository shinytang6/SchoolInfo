# 校园信息平台
##

## 技术栈

### 前端

* 语言： HTML/CSS/JavaScript
* 框架： Vue.js（这里因为要快速开发，使用了vue-cli这个脚手架）
* 环境： NPM 

HTML/CSS/JavaScript的学习，在 [http://www.w3school.com.cn/](http://www.w3school.com.cn/)上有详细的教程

Vue直接看官方文档即可 [https://cn.vuejs.org/](https://cn.vuejs.org/)

NPM是个包管理软件，只在用Vue下载依赖包时用到，安装很简单

具体安装教程见 [https://jingyan.baidu.com/article/91f5db1b2bb6941c7f05e33c.html](https://jingyan.baidu.com/article/91f5db1b2bb6941c7f05e33c.html)


### 后端

* 语言： PHP
* 框架： Laravel
* 环境： Apache/PHP/MySql 	

PHP在w3cschool上也有详细教程 [http://www.w3school.com.cn/](http://www.w3school.com.cn/)

Laravel我觉得看官方教程就行 [http://laravelacademy.org/laravel-docs-5_2](http://laravelacademy.org/laravel-docs-5_2)

## 使用说明

#### 前端和后端分别运行在两个不同的端口

前端代码：

	# download
	git clone https://github.com/shinytang6/SchoolInfo

	# change directory
	cd fontend

	# install dependencies
	npm install

	# serve with hot reload at localhost:8080
	npm run dev

后端代码：
	
	启动Apache服务器即可

## 功能

> 这是最需要完成的一些功能

#### 用户

- [ ] 登录jaacount
- [ ] 用户注册
- [ ] 关注活动
- [ ] 取消关注
- [ ] 查看关注活动 
- [ ] 系统推送活动
- [ ] 评论
- [ ] 活动搜索
- [ ] 翻页浏览

#### 管理员

- [ ] 储存用户信息
- [ ] 发布活动信息

## Laravel 5.1 实践

实践了以下功能  
HTTP 路由、HTTP 控制器、迁移、填充数据、关联关系  

通过Eloquent ORM的关联关系功能实现了数据库映射的功能，具体有  
一对一：User和UserAccount一一对应  
一对多：User一对多Post/Post一对多Comment  
多对多：Role可以有多个User，同时User也可以有多个Role，通过中间表role_user关联  
远层一对多：Country一对多User，User下一对多Post  
多态关联：比如文章、视频和评论的关系，Post可以有多个Comment，Vidoe也可以有多个Comment，  
Comment的数据都保存在comments表中，含有item_id、item_type(数据格式App\Models\Post)来实现和Post、Video的映射关系  
多对多多态关联：比如文章、视频和标签的关系，Post多对多Tag，Video也多对多Tag，通过中间表taggable实现，  
具体字段为taggable_id,taggable_type(数据格式App\Models\Post),tag_id  
另外也实践了渴求式加载、save()、create()、associate()、attach()方法

参考资料  
[[ Laravel 5.1 文档 ] Eloquent ORM —— 关联关系](http://laravelacademy.org/post/140.html#polymorphic-relations])  
[实例教程 —— 关联关系及其在模型中的定义（一）](http://laravelacademy.org/post/1095.html)  
[实例教程 —— 关联关系及其在模型中的定义（二）](http://laravelacademy.org/post/1174.html)  
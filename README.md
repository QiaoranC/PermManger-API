# PermManger-API
权限管理API,基于laravel+dingoAPI+entrust

配合[前端](https://github.com/QiaoranC/PermManger-Frontend)

适用Entrust默认设置搭建数据表以及对应模型
表包括：
- `user`
- `role`
- `permisson`
- `role_user`
- `permission_role`
<img width="600" alt="2017-08-21 19 37 43" src="https://user-images.githubusercontent.com/29221630/29517733-079864c4-86a9-11e7-81de-7bcd6c75db1d.png">

其中`user`,`role`,`permission`为主表，`role_user`,`permission_role`为关系表。
关系为`user`有多个`role`, `role`有多个`permission`
除了完成对主表本身的增删改查。
另外还要对主表的CRUD都需要利用到关系表。

<img width="600" alt="2017-08-21 19 41 59" src="https://user-images.githubusercontent.com/29221630/29517731-07575f7e-86a9-11e7-997c-b0806c33df8c.png">

其中为了满足在`user`和`role`在编辑状态获得对应的`role`和`permission`信息。
<img width="600" alt="2017-08-04 20 39 53" src="https://user-images.githubusercontent.com/29221630/28969159-00570824-7956-11e7-8e87-aca48c535357.png">

在get时需要提供对应关系表的信息。                       
<img width="600" alt="2017-08-21 19 43 10" src="https://user-images.githubusercontent.com/29221630/29517734-0798dd0a-86a9-11e7-9ca7-acd4a21021a1.png">

<img width="600" alt="2017-08-21 19 39 31" src="https://user-images.githubusercontent.com/29221630/29517780-46cc42be-86a9-11e7-910c-6596f58d1ba0.png">


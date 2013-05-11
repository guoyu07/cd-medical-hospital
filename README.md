成都车管所指定的驾照体检医院
==========

医院数据来自于<a href="http://www.cdcgs.cn/Hospital/HospitalInfo.aspx">成都车管所-体检医院地址</a>公布的数据。

使用
------
通过hospital.php脚本抓取医院数据，将地址转换为地图坐标。

    /PATH/TO/php -f /PATH/TO/hospital.php
    
从 http://www.cdcgs.cn/Hospital/HospitalInfo.aspx 页面抓取医院的名称和地址; 数据分析是使用simplehtmldom库实现的，感谢作者的分享。
然后通过百度地图的提供的web服务接口，使用医院地址获取地图坐标
输出自组织的JSON格式数据，将输出数据放置于map.html，类似下面的位置。

     //标注点数组
    var markerArr = [{title:"武警四川省总队成都医院",content:"成都市石人南路21号",point:"104.03402|30.677974",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}




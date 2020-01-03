<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/jquery.js"></script>
    <title>Document</title>
</head>
<body>
<form action="{{route('task.store')}}" method="post">
    @csrf
    <label for="任务来源">
        任务来源
        <input type="text" name="plant" id="">
    </label>
</br>
    <label for="任务类型">
        任务类型
        <input type="text" name="task" id="">
    </label>
</br>
    <label for="任务类型App流量">
        任务类型App流量
        <input type="text" name="type" id="">
    </label>
</br>
    <label for="商品链接">
        商品链接
        <input type="text" name="pro_url" id="">
    </label>
</br>
    <label for="商品标题">
        商品标题
        <input type="text" name="pro_title" id="">
    </label>
</br>
    <label for="商品关键字">
        商品关键字
        <input type="text" name="keyword" id="">
    </label>
    <label for="商品备注">
        商品备注
        <input type="text" name="remark" id="">
    </label>
</br>
     <label for="0点">
         0
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="1点">
         1
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="2点">
         2
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="3点">
         3
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="4点">
         4
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="5点">
         5
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="6点">
         6
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="7点">
         7
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="8点">
         8
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="9点">
         9
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="10点">
         10
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="11">
         11
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="12">
         12
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="13">
         13
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="14">
         14
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="15">
         15
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="16">
         16
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="17">
         17
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="18">
         18
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="19">
         19
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="20">
         20
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="21">
         21
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="22">
         22
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
     <label for="23">
         23
        
        <input type="number" name="tasks_info[0][times][]" id="">
    </label>
</br>
    <label for="条件1">
        附件条件1
        <input type="text" name="custom_1" id="">
    </label>
</br>
    <label for="条件2">
        附件条件2
        <input type="text" name="custom_2" id="">
    </label>
</br>
    <label for="条件3">
        附件条件3
        <input type="text" name="custom_3" id="">
    </label>
</br>
    <label for="条件4">
        附件条件4
        <input type="text" name="custom_4" id="">
    </label>
</br>
<label for="任务开始时间">
    任务开始时间
    <input type="text" name="start_time" id="">
</label>
</br>
  <label for="发布几天">
      任务有几天
        <input type="text" name="taskDay" id="">
    </label>
    <button type="submit">提交</button>
</form>
</body>
</html>
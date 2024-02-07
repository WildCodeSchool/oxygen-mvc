<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'formation' => ['FormationController', 'show',['id'] ],
    'discipline' => ['DisciplineController', 'index',],
    'discipline/show' => ['DisciplineController', 'show',['id']],
    'contact' => ['ContactController', 'index'],
    'admin' => ['AdminController', 'index'],
    'admin/discipline' => ['AdminController', 'discipline'],
    'admin/formation' => ['AdminController', 'formation'],
    'admin/formation/delete' => ['FormationController', 'delete'],
    'admin/student' => ['AdminController', 'student'],
    'admin/contact' => ['AdminController', 'contact'],

];

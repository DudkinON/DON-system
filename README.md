# DON system 
DON system is a micro-framework used for PHP development
## Installation
in Windows, install [Git](https://git-scm.com/downloads), 
run Git Bash, and type the following shell command: 

```
git clone "https://github.com/DudkinON/DON-system/"
```

in Linux, install [Git](https://git-scm.com/downloads)

Type the following shell command:

```
git clone "https://github.com/DudkinON/DON-system/"
```

## Usage
To create your application:
1. Create folder with same name as your_app_name
2. In this folder, create two files - routes.php and controller.php
3. In file settings.php, add your app name in apps 
4. In file routes.php, in your app, add routes:

4.1 with regular expression usage:
```
'regular_expression' => 'action_name'
```

4.2 with function style :

```
url('/route', 'action', 'name'),
```

> In url function '/route' change to path you want to see in browser.
For example '/route' equaled www.domain.com/route, '/blog' equaled
www.domain.com/blog, ect. 'action' have to be named the same with function that handles 
the request. For example if you give name 'index' in `apps/articles/routes.php` : 
```
url('/news', 'index', 'name')
```
> DON system will try to find in `apps/articles/controller.php` function: "index"
if function "index" do not exist,



5 - In file controller.php, add the following code:

`use don\core\AdminBaseController;`

5.1 Create class your_app_nameController

5.2 Extends your class from AdminBaseController

5.3 Create function:

```sh
public function action_name($args)
    {
        render('template_name', $args);
    }
```

where action_name change on your action name, and template_name change
your template name. This function handles the request. For example 
if you go to www.domain.com/news - DON system will call function news.

> More about syntax the Twig in templates read in official
[documentation](https://twig.symfony.com/doc/2.x/).

6 - By default in DON system define route
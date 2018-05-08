# faq
To run the FAQ project:
git clone https://github.com/lookittah/faq.git
CD into FAQ and run composer install
cp .env.example to .env
run: php artisan key:generate
setup database / with sqlite or other https://laravel.com/docs/5.6/database
Run: php artisan migrate
Run: unit tests: phpunit
Run: seeds php artisan migrate:refresh --seed
To run my deleteCascade feature :
1 Install postgres locally on my machine
here is the website: https://www.postgresql.org/docs/9.3/static/tutorial-install.html
2 install the postgres driver 
here is the website to get:https://stackoverflow.com/questions/7180869/install-pdo-for-postgres-ubuntu
after testing that the driver is connected and postgres is working,
seed the table, by typing on the terminal php artisan make:refresh --seed
Create a new branch for the CascadeDelete
in the answer migration table add the cascadeDelete code which will delete
a question and answers
commit it and push it to git
checkout master branch , and merge branches
in the profile migration table ,add the cascadeDelete code which will delete user and delete 
profile commit the change
check out master branch , merge branches 

push to git
push everything to Heroku.
in the test file for answerTest. php, write a code to test that the code is working 
in the test file for ProfileTest. php , write a code to test that the code is working
all the code are posted on my github.

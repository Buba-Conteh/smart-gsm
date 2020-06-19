ADD USERS MODULE:
1. Add a users link on the main navigation sidebar;
2. Create a new page called users.php;
    * make the users page to look like the customers page ( index.php );
    * your users html table should have these columns:
        * first name,
        * middle name,
        * last name,
        * email address,
        * phone
        * Created At
****
3. Create a mysql table called users in your cms_app database. The table should have below fields/columns
    
    * id: integer, primary, auto increment
    * first_name: varchar - 60;
    * middle_name: varchar - 60;
    * last_name: varchar - 60;
    * password: varchar - 100
    * email_address: varchar - 60
    * phone: char - 10,
    * created_at: timestamp;

4. Assignment:
* Implement a full CRUD functionalities of the Users Module. That is implement a create user, edit, view and delete user functionalities. Just as the customers module. 
* > NOTE: In the create user functionality, the password should be inserted too by providing a default password in your php script.

5. Bonus:
    1. Try to implement some simple validations, by 
        1. checking that email address is unique for a user
        2. phone number is unique

    2. Try to design a login form/page

$password = md5('password');
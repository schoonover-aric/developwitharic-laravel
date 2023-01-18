<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //protected $guarded = []; //declared in service provider

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

/*
***** What's the purpose of this file? *****

app > Models > Comment.php

Model for post Comments
    -defines Post/Comment relationship 'belongsTo' -> an inverse 'one-to-one' or 'one-to-many' relationship 
    -defines Post/Author relationship, same as above 'belongsTo' relationship

Laravel MVC:
    Model: It interacts with the database.
    -This component of the MVC framework handles data used in your application. It helps to retrieve the data from the database and then perform some operation that your application is supposed to perform then it stores that data back in the database.
    -In simple words, we can say that Model is responsible for managing data that is passed between the database and the User Interface (View).

    View: User Interface. It contains everything which a user can see on the screen.
    -This component is User Interface, which defines the template which is sent as a response to the browser. This View components contain the part of code which helps to display data to the  User Interface on the user’s browser. For example, we can say the buttons, textbox, dropdown menu, and many more such widgets on the browser screen are the part of View Component.
    
    Controller: It helps to connect Model and View and contains all the business logic. It is also known as the “Heart of the application in MVC”.
    -This controller component helps to interact with the model component to fetch data from the database and then pass that data to the view component to get the desired output on the user’s browser screen. Same way, when the user enters some data the controller fetches that data and then performs some operation or just inserts that data into the database with the use of the model components.
*/
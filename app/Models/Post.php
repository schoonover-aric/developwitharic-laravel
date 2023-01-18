<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    //protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                    $query->where('username', $author)
            )
        );
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

/*
***** What's the purpose of this file? *****

app > Models > Post.php

Model for Posts
    -defines Post/Comment/Category/Author relationships:
        - a Post 'hasMany' comments
        - a Post 'belongsTo' a category
        - a Post 'belongsTo' an author

Provedes Search function 
    -search title or body text
    -works with Category and/or Author filters selected, as well

Laravel MVC:
    Model: It interacts with the database.
    -This component of the MVC framework handles data used in your application. It helps to retrieve the data from the database and then perform some operation that your application is supposed to perform then it stores that data back in the database.
    -In simple words, we can say that Model is responsible for managing data that is passed between the database and the User Interface (View).

    View: User Interface. It contains everything which a user can see on the screen.
    -This component is User Interface, which defines the template which is sent as a response to the browser. This View components contain the part of code which helps to display data to the  User Interface on the user’s browser. For example, we can say the buttons, textbox, dropdown menu, and many more such widgets on the browser screen are the part of View Component.
    
    Controller: It helps to connect Model and View and contains all the business logic. It is also known as the “Heart of the application in MVC”.
    -This controller component helps to interact with the model component to fetch data from the database and then pass that data to the view component to get the desired output on the user’s browser screen. Same way, when the user enters some data the controller fetches that data and then performs some operation or just inserts that data into the database with the use of the model components.
*/
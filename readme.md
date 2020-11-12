# Title: Doctrine

- Repository: `php-doctrine`
- Type of Challenge: `Learning Challenge`
- Duration: `2 days`
- Deployment strategy : `NA`
- Team challenge : `solo`

## Learning objectives
- Learn basic terminology of an ORM (Entities, relations, ...)
- Learn to create a basic crud with Doctrine
- Learn to make a REST API

## What is Doctrine?
Doctrine is an object-relational mapper (ORM) for PHP that provides transparent persistence for PHP objects. It tries to get you a complete separation of your domain/business logic from the persistence (saving your data) in a relational database management system.

The benefit of Doctrine for the programmer is the ability to focus on the object-oriented business logic and worry about persistence only as a secondary problem.

If you want to read more you can always go to [the documentation](https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html)

## What are Entities?
Entities are PHP Objects that can be identified over many requests by a unique identifier or primary key.

An entity contains persistable properties. A persistable property is an instance variable of the entity that is saved into and retrieved from the database by Doctrine's data mapping capabilities.

Entities can have relations with other entities (or with themselves) in the form of 1:N, 1:1 or N:N relationships.

All these configuration is done with "annotations", little comments above the properties of a class. You can look into the file [Student.php](Student.php) to see it in action. This means that the comments have meaning in this, you cannot just remove them!

## The mission 

### Step 1: Configure Doctrine 
**You can skip this step if you are using symfony**

Create a new database based on the import.sql file.

Then install Doctrine using Composer and configure the database connection. You can find all the documentation for this on [the doctrine website](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/tutorials/getting-started.html#getting-started-with-doctrine).

You can copy most boilerplate setup code from the documentation, be sure to include into `createAnnotationMetadataConfiguration` the location where all your entities with annotations are. The default is `src`.

### Step 2: Create the Teacher entity
We already proved the Student entity, you will have to create a Teacher entity. You can choose which data to store for the Teacher, but at least it should contain a name, an e-mail and an address.

If you are using Symfony, you can use the maker bundle to generate the entity for you: run `bin/console make:entity`.

#### Separating Concerns using Embeddables
We also provided the Address entity but this is a special case: it is an [embeddable](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/tutorials/embeddables.html), that you will use on both the Student and the Teacher entity.

Embeddables are classes which are not entities themselves, but are embedded in entities. You'll mostly want to use them to reduce duplication or separating concerns. Value objects such as date range or address are the primary use case for this feature.

### Step 3
We will now write a ***REST api***, while using the Doctrine entities to save the data.

A REST api is a simple convention that uses the different HTTP methods to provide CRUD functionality. When it displays information it most of the time does it in the JSON format.

We will provide the following pages:

- GET RestTeacher.php (overview page in JSON)
- GET RestTeacher.php?id=X (full details of entity in JSON)
- PUT RestTeacher.php (create new entity)
- POST RestTeacher.php?id=X (Update)
- DELETE RestTeacher.php?id=X (Delete)


- GET RestStudent.php (overview page in JSON)
- GET RestStudent.php?id=X (full details of entity in JSON)
- PUT RestStudent.php (create new entity)
- POST RestStudent.php?id=X (Update)
- DELETE RestStudent.php?id=X (Delete)

The student detail page should contain a reference to the teacher, the teacher detail page should contain an array of all his students.

If you delete a teacher you should also delete all his students. If your configure your cascading for the relation correctly in Doctrine this should happen automatically.

### Testing your REST api
Because you cannot do a PUT or DELETE request with the browser, you will need some REST client to test all methods.
PHPStorm comes with a REST client out of the box, you can find it at:

`tools > http client > test restfull webservice`

Alternatively, if you do not use PhpStorm you could use several free tools as a rest client, a really popular one is [postman](https://www.getpostman.com/).
You could also use several browser extensions in Chrome or Firefox.

## Nice to have features
- Implement basic HTTP autentication with headers to restrict access
- Create a Classroom entity that has a ManyToMany relation to Teachers (several teachers can use the same room, but can also use several rooms).

### Tips
- On PHP level, you can test which type of HTTP method was used by using `$_SERVER['REQUEST_METHOD']`.
- You can json_encode($data, JSON_PRETTY_PRINT) to display JSON that has a nice layout in the browser.

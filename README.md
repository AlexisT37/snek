# object oriented programming in php

the class declaration does not work well in php 7.3, you need to have at least 7.4

if you want to put the strong declare typing then you should have nothing else but php in there

php will convert the values automatically and will not type check
so you will activate the type check directly, that will avoid a lot of mistakes

even with the checking if for instance you have ints in the middle of strings, if php recognize math operators then it will
do the operation, discarding the characters, you must avoid this at the stage of setting variables

to make a method, you need to put a function , specify that it is public
then you put a : with the return type
then you put this because this is whatever the class is
and then you can choose the variables

inside the declaration of a method, you should put this with $

for functions, you should use camelcase thisIsARaid

it is technically possible to have a variable and a method of the same name, but it is not recommanded

## the exercise

1 so in short where did we use $this-> and why didn't we use $this everywhere like i thought initially ?
2 why do we use & in the second function and not the first ?
3 why don't we need to initialize the variables outside the functios ?
4 where do we use -> and why ?

2 we use & because we want to actually directly change the variable
we use this because we want to call the method of our object inside another method
for instance, we use this inside the method to set the player level because we
want to use the result of the other method inside the second method

in the first function, all that is used as variables in the function are the 2 arguments

THE PARAMETER and the argument are the same thing, except the parameter is what we talk about in the definition
the argument is what we use in the calling of the function

# classmethods

now we managed to get what we want ^^
the method to display the information of objects are as follow
get_class_methods() => you need to put the argument instance between ''
get_object_vars()
get_class_vars()
get_class() <-- for the name of the instance

if a class is not defined as public but private, then it will only work if it is called inside another method of a class,
you cannot randomly call it whenever you want in the code

if a method is private, it can only be used inside of another method that uses it
if a variable is private, it can only be changed inside a method that uses it, NOT BY RANDOMLY USING IT OUTSIDE THE CLASS

## the cat variable

let's say we want to put a cat variable in the class
we declare it in the class encounter
then we only call it in the class
i have to use verbal exlanation because I can't hold a lot of information in my head, because it's going to be discarded right away

if we try to call it outside the class or its instanciation then it says
undefined,
echo $cat => undefined

if we put it inside the class method that is public it works
echo $this->cat => nina

if we try to access the variable outside a method
echo $hotstuffbetweenus->cat => fatal error

## what is encapsulation ?

it seems that we are just setting variables as private
and then we build a method to specifically change them,
kinda like a setter in react ?

to use a static method, we reference the class then the method
Class::methodname();

so what we just did by adding a static method and a method that uses a static method is that
we can now use that function that only interacts with the class and not the instance
to actually greenlight a function that will indeed interact with the class

you use self::methodname() that will be a good hint to know that it is a static method
we added a function that increments a static variable
then we can display the content of that variable, which doesn't depend on any of the instances
a static variable is allowed to be called using the name of the class only and not the name of the instance
a static method will work with the class and not the object

that's so sweet

### constants

just like javascript, we can use constants: they're immutable values
and they are going to be useful for makeing "safe" values that don't change
i just declared a constant and now I can't set the type ? okay i guess since it doesn't change
you use UPPERCASE to declare constants
it's always static so you use self to call it

### exercise correction

I was missing the part where I need to put self:: to call a function
also, I want to put all the constants outside the class inside the class
now i corrected everything in the exercise. What changed ?
i set the self:: component in the assignment part of the declaration
the right part of the equal
and then i change every call to the constansts in the functions declaration to self::CONSTANTNAME

also, in the code lower, in the function code, insteade of calling an instance
we use the class call with Encounter::functionname
also, in the function call whose parameter is a constant, well the
argument must have the class call attached to it, just not the constant name

## common method for every object

**construct and **descruct are method that come from php and can be used implicitely by all the classes
construct is used to build the instance and is called automatically when you use the new
destruct is used at the end of the script
what happens if we use \_\_construct in place of the name of method ?
so maybe this is not connected but we're not sure so let's explain
we merge the 2 methods into one and instead of giving it a name we just say \_\_construct(param1, param2)
also we don't declare a return value (we specified void in the 2 methods)
we don't call the methods in the 2nd example
instead when the instance is created, we just pass the 2 values as arguments of the instance
and then it calls the \_\_construct automatically
is it really useful ? i'm not sure but it sure shows that the method construct is indeed called

IMPORTANT ! if you use the \_\_construct you can directly skip the variable assignment,
as long as you have the parameters set, php 8 (not before) will do it automatically
however, for this to work, you indeed neet to build the function with the proper parameters

here in the video the guy does something very interesting :
he puts two objects inside a single variable, separated by a comma
no wait he is not doing that, let's look again
there are 2 classes, pont and tablier
then in the instanciation, he makes the pont and then the tablier inside the pont
oooh but that wouldn't work inside my own file because you need to build the classes using construct
i'll do another file

### cloning: the clone method allows to copy every property present in an object to another object

okay so it seems that we need to create a specific clone method in the declaration of our object
because when there is a subobject then the clone for the main object will make the copy point toward the original subobject
instead of creating a copy. By creating this clone method that points to the subobject, we ensure that we indeed
create a copy of the subobject instead of pointing to the original subobject
that's because in php instances are shared and if you point to an already existing instance whit a copy
it creates an overlap in the subobjects

this->tablier = clone $this->tablier
this way we will indeed create a new copy of the subobject tablier
this can go vache kiri because if we have a sub sub object then we need to create the clone method inside tablier for the subobject ect

be careful because although it works in php 8, in previous versions you get an error
why do we do it this way by recursion ? because it's the way to make sure we actually use the method below in the child

### \_\_toString()

the \_\_toString() method is used whenever we want to decide what we want to display when we want to get the info of an object
we create this method and then we return a sprintf for instance
sprintf we get the variables in text with a % and then the variables as a second parameter

tostring is kinda weird because i see the thing: we want to print this variable, this object
and get the useful property nicely shown, but for some reason I get 0

i'll try again later

### invoke

\_\_invoke is a function that looks interesing, let's visit it
the invoke method allows us to get to the variable and call it like a method with parameters
it will simply act as if it was a function

## inheritance

you can't call by reference child properties from the parent
it works in cascade
instead of self::property you can call parent::property

## overloading

we can rewrite a child method based on the parent method
what about overloading rules ?
you cannot remove arguments
you can add an argument ONLY if it is obtional, that way it doesn't break the parent usage
you can change the type of argument only if the type is compatible with the original type
you can change the return type ONLY if the new type is compatible with the original return type\

you can either overload the parent method and add stuff or completely rewrite the method
if you overload you call with parent::method

if you have inheritance and target a parent property, you can
call the method of the current class using $this or self:: for the static methods
or you can target the parent method with the keyword parent::

the problem is that if you have several layers of parents, you can't specify if you want to call a parent or let's say a grandparent
what you do then is that you call a parent method and then make sure that this parent method calls itself for its parent, that way
you go to the grandparent

## protected

protected means that you will only have access to the function as part of the inheritance process
in short, a child class, or the class itself, are the only ones who can access the function

## abstraction in oop

an abstracted class is a class that is never going to be used on its own but is always going to be extended to a child
for instance if we have the player class in guild wars 2, as soon as you log in, you are not going to be a player
instead you're going to be one of the 9 professions, and then 1 out of 4 specs, core or elite

you can abstract classes but also function
if you want to do abstraction for a function you don't specify it's behaviour as code inside the brackets, you
put nothing.
However you put a ; at the end and you can also specify its return type
if you write an abstnact class in a parent, then it must be declared and full functionalized in every children
otherwise that means you are abstracting even further to grandchildren and beyond.
if a method is abstract then the class of that method is also abstract

## prevent inheritance

you can use the keyword final in front of a class so that it cannot be inherited
if i have 3 classes, for instance the class book then novel then eronovel
if eronevel extends novel but i write abstract in front of novel then fatal error

## control parent behaviour

you can static instead of self for referenc. self is about the current class,
while static is about also being able to select the child element instead
this is late static binding, where the value resolution happens not when the code is analyse but at runtime

# namespace

namespace is used to divide our code even further
that way you can actually write 2 different classes with the same name,
as long as they have different namespaces there will be no overlap

if you use samespace to encapsulate your classes, then you will have to create a
namespace to encapsulate the code after that
luckily you can get the full namespace of an object by using the getclass method
then you will have the \\, or the FQCN which is the fully qualified class name

a good thing is that if you don't want to bother with a namespace for your main code you can
just put no name instead => namespace {}
imports look like uris and you type the keyword use to import
there is an autoimport for php maybe intellehant

if you have a method that is in the global namespace, just prevent the waste of time of php of looking for it in every namespace
by putting a backspace in front of its name
require_once is done so you can import files

# traits

traits are like a superclass and it allows to overcome the problem of not being able to
inherit from several classes at the same time
a trait is like a class that cannot be instanciated
a traitcan be shared freely by different classes
a trait can be composed of other traits
you can use several traits in one class

# interface

interfaces are declared like classes but can only contain method signatures
the signature of a method is everytthing that gives info no the method
the name, the parameters, return value, types,

with an interface you only write a signature not any content
an interface can work as a type in a parameter of a method

just like classes, interfaces can inherit from other interfaces

for instance, if we take 2 interfaces + 1 interface that ties the 2 first together
each method below uses the interface tailored for its need
don't use interfaces as conditions
the keyword instance of allows to use the used classes and interfaces
if you differenciate behaviour by checking classes with instanceof then it's not the rigth behaviour
because it means that your code does too many things at the same time

# ternary operator

you can use ? and then : to make a useful shorthand operator

# clever use of continue

if you want to skip a specific kind of element in an array
you can use continue whenever you validate that array

# shorthand with ??

you have one variable and you will do one action or the other
echo a ?? b;
echoes variable a else echoes variable b

# spaceship operator

<=>
returs different value according to the comparison, -1, 0, 1
works for alphabetical order too

# operator === and conversion

if you put (int) before a variable it tests for the int version of that variable
(int) does convert the variable on assignment, it's not just "seeing what would happen if it were an int"

# sorting your code, indentation, upper and lower case

default visibility is public but it's good practice to say it
for an if or else or elseif statement you should put the curly bracket on the line and not the line below
elseif should be one word and not 2

# code in php like a pro

https://www.youtube.com/watch?v=tHcijydtSJw

## kiss keep it simple, stupid

don't try to do to many one liners and complex functions

## less is more, less code is better

less plugins, less code, less comments

## use what you got... first

# coding in php like a pro exameple

don't use raw sql, use an orm
apply the cmv design pattern

# php interview questions

# cs dojo 5 tips for problem solving

## 1 find a brute force solution

## 2 find a simpler version of the problem

## 3 think about the problem with simpler examples -> try noticing a pattern

for instance if array then small array, ect
if you modelizen the array results in a square for the closest sum problem,
then you realize that there is an established zone of closer results and you can eliminate everything that
falls outside that zone (like lava techtonic plate)

## 4 use some vizualisation

example of visualization here is using a much bigger grid to get a clearer pattern for the zone

## 5

test your solution on a few examples

# tips for efficient developers

## no multitasking

## kno you ide

### functionalities

### shortcuts

## don't do menial work, try to automatize everything

## DON'T DO THINGS THAT YOUR COMPUTER CAN DO FOR YOU

## automate testing

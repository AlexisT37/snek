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

now we managed to get what we want ^^
the method to display the information of objects are as follow
get_class_methods()
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

that's so sweet

### constants

just like javascript, we can use constants: they're immutable values
and they are going to be useful for makeing "safe" values that don't change
i just declared a constant and now I can't set the type ? okay i guess since it doesn't change
you use UPPERCASE to declare constants
it's always static so you use self to call it

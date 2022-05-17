# foreach

in php we use foreach because
it allows us to go through an array without knowing the length
the problem with a simple foreach statement is that the element remains in scope
which means the magnifying glass stays on focus and we remain tethered to this last element
if we keep using the name of the element, then we might end up modifying the data in which we used
the foreach loop
in the example we use a referenc iteration with the & and it means we keep modifying the value
to prevent that kind of behaviour, remember to use unset($value);
this will get the magnifying glass away

# understanding isset behaviour

issset returns false if an item does not exist but also if we got NULL
the main logic problem here is that sometimes we are going to assume that we will get our !isset if some value is false
but it will check whether it is equal to null, therefore we might end up getting something of a false negative
if we wants to check if a piece of data really exist, it is better to use
array_key_exists()
we can also combine it with get_defined_vars()
this gives a very robust check

# reference vs value

if we have a situation in a class where we pass by value, we would not be able to find the variable
in a later call. To remedy that, we need to explicitely call by reference with the &
otherwise, it will return the piece of data by value, which means it creates a copy of the data

you can create a real copy of the original data, or you can really work with reference from the beginning,
depending on what you are trying to do

IMPORTANT ! you can make a function return a referenc by putting a & in front of it

in php, objects are always passed by reference

variables and arrays are passed by value, objects by reference

in general, make sure to use getters and setters

# queries in a loop

in short, you have to be careful in how you interact with queries and loops,
because you may end up generating many many queries to get each data point,
while it is much more efficient to hold all the data points in a single query

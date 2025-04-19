// Alert message
alert("Welcome to the JavaScript Demo!");

// Calculate average number of weeks in a human lifetime
let years = 80;
let weeks = years * 52;
document.getElementById("weeks").innerText = "Average weeks in human lifetime: " + weeks;

// Store a string in a variable
let name = "Mrunal Bhamare";
document.getElementById("name").innerText = "Name: " + name;

// Time of the day program
let hour = new Date().getHours();
let timeOfDay;

if (hour >= 5 && hour < 12) 
{
    timeOfDay = "Good Morning!";
} 
else if (hour >= 12 && hour < 16) 
{
    timeOfDay = "Good Afternoon!";
} 
else if (hour >= 16 && hour < 19) 
{
    timeOfDay = "Good Evening!";
}
else 
{
    timeOfDay = "Good Night!";
}

document.getElementById("timeOfDay").innerText = timeOfDay;

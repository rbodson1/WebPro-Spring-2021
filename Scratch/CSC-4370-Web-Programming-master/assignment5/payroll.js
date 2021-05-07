var empNum = 0;
var totalPay = 0;
var hoursWorked;
var empPay;
var wages = [];
var weeklyPay = [];
//declare variables for storing, employee count, total pay, each employee's hours worked and pay and arrays for wages and pay per week

//for loop for number of employees up to 100
for (var emp = 0; emp < 100; emp++) {
    hoursWorked = parseFloat(prompt("Enter Hours worked for " + (emp + 1) + " Employee", "Employee " + (emp + 1)));
    //take input on number of hours
    if (hoursWorked < 0 && empNum == 0) {
        alert("Enter hours for at least 1 employee.");
        break;
    }//if user enters negative number at first break out and alert
    else {
        if (hoursWorked >= 0) {//if hours are positive
            wages[emp] = hoursWorked;
            empNum = empNum + 1;
            //add to wages array and increment employee count
            if (wages[emp] < 40) {
                //if wages < 40 then $15 per hour
                empPay = wages[emp] * 15;
                weeklyPay[emp] = empPay;
                //add to weeklyPay array
            }
            else {
                //if wages > 40 then for more than 40 hours pay rate is one and half time
                empPay = 40 * 15 + (wages[emp] - 40) * (15 + 15 / 2);
                weeklyPay[emp] = empPay;
                //add to weeklyPay array
            }
            totalPay = totalPay + weeklyPay[emp];//add to total pay
        }
        else {
            //if negative then break;
            break;
        }
    }
}

var row;
var col;
//variables for row and columns
var table = document.createElement("Table");
table.setAttribute("border", "1px");
row = table.insertRow(i);
col = row.insertCell(0);
col.innerHTML = "No";
col.setAttribute("class", "th");
col = row.insertCell(1);
col.innerHTML = "Number of hours worked";
col.setAttribute("class", "th");
col = row.insertCell(2);
col.innerHTML = "Employee's pay for the week";
col.setAttribute("class", "th");
//create the table and set attributes

for (var i = 0; i < empNum; i++) {//loop for number of rows
    row = table.insertRow(i + 1);//create row

    col = row.insertCell(0);
    col.innerHTML = (i + 1);
    //insert cell for employee number

    col = row.insertCell(1);
    col.innerHTML = wages[i];

    col = row.insertCell(2);
    col.innerHTML = weeklyPay[i];
    //insert cell for weekly pay
}

var div = document.getElementById("table");//add table to the body

div.appendChild(table);//displaying total pay

document.getElementById("totalPay").innerHTML = totalPay;//make it display the total pay
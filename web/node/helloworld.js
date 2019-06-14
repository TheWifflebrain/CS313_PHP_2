var myData = 
{
    "name": "Dylan Doelling",
    "class": "CS313",
    "major": "CS"
};

var http = require('http');

http.createServer(function (req, res) 
{
    if(req.url == "/home")
    {
        res.writeHead(200, {"Content-Type": "text/html"});
        res.write('<html><head></head><body>');
        res.write('<h1>Welcome to the Home Page</h1>');
        res.write('</body></html>');
        res.end();
    }
    else if(req.url == "/getData")
    {
        res.writeHead(200, {"Content-Type": "application/json"});
        res.write(JSON.stringify(myData));
        res.end();
    }
    else if(req.url == "/prettyGetData")
    {
        res.writeHead(200, {"Content-Type": "application/json"});
        Array.from(Object.keys(myData)).forEach(function(key){
            res.write(key + ": ")
            res.write((myData[key]));
            res.write("\n");
        });
        res.end();
    }
    else if(req.url.includes("/mult"))
    {
        //ex. /mult?num1=45&num2=5
        var url = require('url');
        var numbers = url.parse(req.url, true);
        var qNumbers = numbers.query;
        var num1 = qNumbers.num1;
        var num2 = qNumbers.num2;
        var result = num1 * num2;
        res.writeHead(200, {"Content-Type": "text/plain"});
        res.write(num1 + "*"+ num2 + " = " + result);
        res.end();
    }
    else if(req.url.includes("/div"))
    {
        //ex. /div?num1=45&num2=5
        var url = require('url');
        var numbers = url.parse(req.url, true);
        var qNumbers = numbers.query;
        var num1 = qNumbers.num1;
        var num2 = qNumbers.num2;
        var result = num1 / num2;
        res.writeHead(200, {"Content-Type": "text/plain"});
        res.write(num1 + "/" + num2 + " = " + result);
        res.end();
    }
    else if(req.url.includes("/printthis"))
    {
        //ex. /printthis?print=how%20are%20you
        //%20 add spaces
        var url = require('url');
        var text = url.parse(req.url, true);
        var qtext = text.query;
        var print = qtext.print;
        res.writeHead(200, {"Content-Type": "text/plain"});
        res.write(print);
        res.end();
    }
    else
    {
        res.writeHead(404, {"Content-Type": "text/html"});
        res.write('<html><head></head><body>');
        res.write('<h1>404 Page Not Found</h1>');
        res.write('</body></html>');
        res.end();
    }
}).listen(8888);

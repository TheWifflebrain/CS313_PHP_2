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
    else
    {
        res.writeHead(404, {"Content-Type": "text/html"});
        res.write('<html><head></head><body>');
        res.write('<h1>Page Not Found</h1>');
        res.write('</body></html>');
        res.end();
    }
}).listen(8888);
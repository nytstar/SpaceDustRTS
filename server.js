var express = require("express");
var socketio = require("socket.io");
var https = require("https");
var app = express();
var host = "206.189.188.13";
var port = 3000;
var players = [];
var bases = [];

var server = https.createServer(app);

server.listen(port,function()
{
    console.log("Space Dust Server has been Started");
});

app.use(express.static("Public"));

var IO = socketio(server);

IO.sockets.on("connection",function(socket)
{
    console.log("New Connection: " + socket.id);

    socket.on("error",function(err)
    {
        console.log(err);
    });

    for(i = 0; i < players.length; i++)
    {
        socket.emit("create",{
            id: players[i]
        });
    }

    players.push(socket.id);

    socket.on("spawn",function(data)
    {
        socket.broadcast.emit("spawn",data);
    });

    socket.on("position",function(data)
    {
        var current_player = players.indexOf(data.id);
        current_player.x = data.x;
        current_player.y = data.y;
        socket.broadcast.emit("position",data);
    });
    
    socket.on("disconnect",function()
    {
        var index = players.indexOf(socket);
        players.splice(index,1);
        socket.broadcast.emit("destroy",{id: index});
        console.log("Player Disconnected: " + socket.id);
    });
});
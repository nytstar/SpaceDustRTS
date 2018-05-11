var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
var map_width = canvas.width = canvas.scrollWidth = window.innerWidth;
var map_height = canvas.height = canvas.scrollHeight = window.innerHeight;
var world_width = map_width;
var world_height = map_height;
var background = new Image();
var default_x = map_width/2;
var default_y = map_height/2;
var players = [];
var bases = [];
var keys = [];
var socket;
var camera;

function Awake()
{
    socket = io.connect("http://localhost:8003");
    background.src = "Sprites/black.png";
    camera = new Camera(context);
    Start();
}

function Start()
{
    socket.on("connect",function()
    {
        console.log("Player Connected to the Server");
        var xx = irandom_range(0,world_width);
        var yy = irandom_range(0,world_height);
        var new_player = new Spaceship("player_spaceship.png",default_x,default_y,96,72,5,socket.id);
        players.push(new_player);

        socket.emit("spawn",{
            id: socket.id,
            x: default_x,
            y: default_y
        });

        socket.on("create",function(data)
        {
            var new_player = new Spaceship("Sprites/player_spaceship.png",default_x,default_y,96,72,5,data.id);
            players.push(new_player)
        });
    
        socket.on("spawn",function(data)
        {
            var new_player = new Spaceship("Sprites/player_spaceship.png",data.x,data.y,96,72,5,data.id);
            players.push(new_player);
        });
    
        socket.on("position",function(data)
        {
            for(i = 0; i < players.length; i++)
            {
                if(socket.id != data.id && players[i].id == data.id)
                {
                    players[i].x = data.x;
                    players[i].y = data.y;
                }
            }
        });
    
        socket.on("destroy",function(data)
        {
            console.log("Player Disconnected");
            players.splice(data.id,1);
        });
    });

    Update();
}

function Update()
{
    background_sprite(background);
    camera.begin();

    for(i = 0; i < players.length; i++)
    {
        players[i].update();
        players[i].draw();

        socket.emit("position",{
            id: players[i].id,
            x: players[i].x,
            y: players[i].y
        });
    }

    camera.end();
    requestAnimationFrame(Update);
}

function KeyPressed(event)
{
    keys[event.keyCode] = true;
}

function KeyReleased(event)
{
    keys[event.keyCode] = false;
}

window.addEventListener("load",Awake);
window.addEventListener("keydown",KeyPressed);
window.addEventListener("keyup",KeyReleased);
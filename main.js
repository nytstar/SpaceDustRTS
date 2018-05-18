var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
var world_width = window.innerWidth;
var world_height = window.innerHeight;
var map_width = canvas.width = canvas.scrollWidth = world_width;
var map_height = canvas.height = canvas.scrollHeight = world_height;
var default_x = map_width/2;
var default_y = map_height/2;
var mouse_pressed = false;
var right_mouse_pressed = false;
var background = new Image();
var background_pattern;
var mouse_x = 0;
var mouse_y = 0;
var players = [];
var bases = [];
var keys = [];
var socket;
var camera;

function Awake()
{
    socket = io.connect("http://localhost:3000");
    camera = new Camera(context);

    background.src = "black.png";
    
    background.onload = function()
    {
        background_pattern = context.createPattern(background,"repeat");
    }

    Start();
}

function Start()
{
    socket.on("connect",function()
    {
        console.log("Player Connected to the Server");
        background.src = "black.png";
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
            players.push(new_player);
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
    background_sprite();
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

function UpdateMouse(event)
{
    rect = canvas.getBoundingClientRect();
    mouse_x = event.clientX - rect.left;
    mouse_y = event.clientY - rect.top;
}

function KeyPressed(event)
{
    keys[event.keyCode] = true;
}

function KeyReleased(event)
{
    keys[event.keyCode] = false;
}

function MousePressed()
{
    mouse_pressed = true;
}

window.addEventListener("load",Awake);
window.addEventListener("keydown",KeyPressed);
window.addEventListener("keyup",KeyReleased);
window.addEventListener("click",MousePressed);
window.addEventListener("mousemove",UpdateMouse);

/*
canvas.oncontextmenu = function(e)
{
    e.preventDefault();
}
*/
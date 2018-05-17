console.log("Sprite.js Loaded");

function Sprite(source,options)
{
    this.source = new Image();
    this.source.src = source;
    this.width = this.source.width || options.width || 0;
    this.height = this.source.height || options.height || 0;
    this.image_index = options.image_index || 0;
    this.image_number = options.image_number || 1;
    this.play = options.play || false;
    this.visible = options.visible || true;
    this.counter = 0;

    this.update = function()
    {
        this.counter += 1;
        if(this.counter > 1/(FPS/500))
        {
            this.counter = 0;
            if(this.play == true)
            {
                if(this.image_number - 1 > this.image_index)
                {
                    this.image_index += 1;
                }
                else
                {
                    this.image_index = 0;
                }
            }
            else
            {
                this.image_index = 0;
            }
        }
    }

    this.draw = function(x,y)
    {
        if(this.visible == true)
        {
            context.drawImage(this.source,this.image_index * this.width/this.image_number,0,this.width/this.image_number,this.height,x,y,this.width/this.image_number,this.height);
        }
    }
}
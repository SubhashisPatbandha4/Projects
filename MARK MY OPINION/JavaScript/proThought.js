
// For Question answer Page
// For user question
function check_val_user_question()
{
        // alert("hello");
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("text_question").value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            document.getElementById("user_question_warning").innerHTML=  "Kindly rephrase or remove these words : "+ array ;
          

    }
    else
    {
            document.getElementById("user_question_warning").innerHTML="";
    }
}
function check_question_submit(){
        var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("text_question").value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            alert("Please remove the following : "+array);
                return false;

    }
    else
    {
        return true;    }

}



//for user answer
function check_question_comment(id)
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("text_answer"+id).value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            document.getElementById("user_answer_warning"+id).innerHTML=  "Kindly rephrase or remove these words : "+ array ;
          

    }
    else
    {
            document.getElementById("user_answer_warning"+id).innerHTML="";
    }
}
function check_question_comment_post(id)
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("text_answer"+id).value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

        alert("Please remove the following : "+array);
        return false;
          

    }
    else
    {
            return true
    }
}




//For blog page
//For blog title

function check_val_user_blog_title()
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("blog_title").value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            document.getElementById("user_blog_title_warning").innerHTML=  "Kindly rephrase or remove these words : "+ array ;
          

    }
    else
    {
            document.getElementById("user_blog_title_warning").innerHTML="";
    }
}

//for blog content
function check_val_user_blog_content()
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("blog_content").value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            document.getElementById("user_blog_content_warning").innerHTML=  "Kindly rephrase or remove these words : "+ array ;
          

    }
    else
    {
            document.getElementById("user_blog_content_warning").innerHTML="";
    }
}
function check_blog_submit()
{
        var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
        var check_text=document.getElementById("blog_title").value;
        var error1=0;
        var array1=new Array( );
        for( var i=0;i<bad_words.length;i++)
        {
    
            var val=bad_words[i];
           if((check_text.toLowerCase()).indexOf(val.toString())>-1)
              
           {
                error1=error1+1;
                array1.push(val);
     
              
           }
    
        }

        var check_text2=document.getElementById("blog_content").value;
        var error2=0;
        var array2=new Array( );
        for( var i=0;i<bad_words.length;i++)
        {
    
            var val=bad_words[i];
           if((check_text2.toLowerCase()).indexOf(val.toString())>-1)
              
           {
                error2=error2+1;
                array2.push(val);
   
              
           }
    
        }

        if(error1>0)
        {
    
                alert("Please remove the following : "+array1);
                return false;
    
        }
        else if(error2>0){
                    
                alert("Please remove the following : "+array2);
                return false;
        }
        else
        {
                return true;
        }
}
function check_blog_comment(id)
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("blog_comment"+id).value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

            document.getElementById("blog_comment_warning"+id).innerHTML=  "Kindly rephrase or remove these words : "+ array ;
          

    }
    else
    {
            document.getElementById("blog_comment_warning"+id).innerHTML="";
    }
}
function check_blog_comment_post(id)
{
    var bad_words=new Array("death","kill","murder", "fuck" , "fucking" , "behenchod", "bitch", "slut") ;
    var check_text=document.getElementById("blog-comment"+id).value;
    var error=0;
    var array=new Array( );
    for( var i=0;i<bad_words.length;i++)
    {

        var val=bad_words[i];
       if((check_text.toLowerCase()).indexOf(val.toString())>-1)
          
       {
            error=error+1;
            array.push(val);
          // document.write(array);
          
       }

    }
    if(error>0)
    {

        alert("Please remove the following : "+array);
        return false;

    }
    else
    {
            return true;
    }
}
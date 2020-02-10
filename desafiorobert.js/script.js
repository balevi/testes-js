function contagem()
    {
        var test = document.getElementById('text').value
        var array= test.split('')
 
           var res= array.reduce(function( object , item )
            {  
                    
                if ( !object[item] ) 
               // if ( object[item]>2 ) 
                    {
                        object[item]=1;
                    } else 
                        {
                            object[item]++;
                            //console.log('a letra ',item ,' se repetiu',object[item],' vezes') 
                            
                        }   
                        
                        return object  
                                         
            },{}) 
            var result = document.getElementById('result')
            result.innerHTML = ''
                //console.log(res)
            for(var prop in res){
                if(res[prop]>1 && prop !=' '){
               // console.log('a letra ',prop,' repetiu '+res[prop],' vezes')
                result.innerHTML +=`a letra ${prop}, repetiu ${res[prop]} vezes <br>`
                }
            }                             
    }
    
var coll = document.getElementsByClassName("collapsibletype");
          var i;
          
          for (i = 0; i < coll.length; i++) {
              this.classList.toggle("active");
              var content = this.nextElementSibling;
              if (content.style.maxHeight){
                content.style.maxHeight = null;
              } else {
                content.style.maxHeight = content.scrollHeight + "px";
              } 
            };
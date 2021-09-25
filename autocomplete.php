<style>

/*the container must be positioned relative:*/
.autocomplete {
  display: inline-block;
}

#searchBarBox {
  display: flex;
  padding: 0;
  position: relative;
  border-radius: 20px;

}

#searchBar {
  height: 50px;
	width: 240px;
	background: white;
	border-radius: 50px;
	display: flex;
	align-items: center;
	justify-content: center;
	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
	outline: none;
	border: 1px solid #DEDEDE;
	font-family: 'poppins', 'arial';
	font-size: 17px;
  padding: 0;
	padding-left: 20px;
	color: #00aeff;
	font-weight: 600;
}

#searchBarSubmit {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  top: 0;
  right: 0;
  height: 100%;
  width: 50px;
	background: #F1F1F1;
	outline: none;
	border: 1px solid #DEDEDE;
	position: absolute;
	cursor: pointer;
  border-radius: 0px 50px 50px 0px;
}

#searchBarSubmit img{
  height: 25px;
  width: 25px;
  margin-left: -2px;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #DEDEDE;
  border-bottom: none;
  z-index: 998;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  font-family: poppins, arial;
  -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
  -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
  box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.1);
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #DEDEDE;
}

.autocomplete-items div #1{
  background-color: red;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #DEDEDE; 
}

#searchBarautocomplete-list{
  overflow: hidden;
  border-radius: 15px;
  margin-top: 15px;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<!--Make sure the form has the autocomplete function switched off:-->
<form autocomplete="off" method="POST">
  <div class="autocomplete">
    <div id="searchBarBox">
      <input type="text" name="searchBar" id="searchBar" placeholder="Nom de la salle" autocomplete="off" autocapitalize="off" maxlength="15" minlength="3" spellcheck="false">
      <button type="submit" id="searchBarSubmit"><img src="images/search.png"></button>
    </div>
  </div>
</form>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the names of the classrooms*/
var salles = ['flaubert','eiffel','daumier','colette','voltaire','tchekov','sand','rimbaud','quesnay','planck','ohm','mozart','marconi','newton','laplace','kepler','isabey','jacquard','gay-lussac','harvey','fleming','einstein','darwin','boole','becquerel','ampère','cuvier','pasteur','de-gennes','bach','molière','kipling','ibsen','nabokov','lamartine','jussieu','hérodote','froissart','dumas','baudelaire','apollinaire','chenier','euripide','giraudoux','kafka','nerval','leibniz','joinville','ingres','hugo','galilée','fermat','erasme','dante','copernic','budé','avicenne','stendhal','pascal','cervantes'];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("searchBar"), salles);
</script>


<style>
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

ul { list-style-type: none; }

a {
  color: #b63b4d;
  text-decoration: none;
}

.accordion {
  width: 100%;
  max-width: 360px;
  background: #FFF;
}

.accordion .link {
  cursor: pointer;
  display: block;
  padding: 15px 15px 15px 42px;
  color: #4D4D4D;
  font-size: 14px;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li:last-child .link { border-bottom: 0; }

.accordion li i {
  position: absolute;
  top: 16px;
  left: 12px;
  font-size: 18px;
  color: #595959;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
  right: 12px;
  left: auto;
  font-size: 16px;
}

.accordion li.open .link { color: #b63b4d; }

.accordion li.open i { color: #b63b4d; }

.accordion li.open i.fa-chevron-down {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

.submenu {
  display: none;
  background: #213740;
  font-size: 14px;
}

.submenu li { border-bottom: 1px solid #4b4a5e; }

.submenu a {
  display: block;
  text-decoration: none;
  color: #d9d9d9;
  padding: 12px;
  padding-left: 42px;
  -webkit-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
}

.submenu a:hover {
  background: #b63b4d;
  color: #FFF;
}


</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<ul id="accordion" class="accordion">
  <li>
    <div class="link"><i class="fa fa-database"></i>Logistyka<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="logistyka/index.php">Karty Pakowania</a></li>
      <li><a href="#">Katalog Opakowań</a></li>
    </ul>
  </li>
  <li>
    <div class="link"><i class="fa fa-code"></i>Produkcja<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="produkcja/index.php">Planowanie</a></li>
    </ul>
  </li>
  <li>
    <div class="link"><i class="fa fa-mobile"></i>Strefa Czyszczenia<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="strefa-czyszczenia/strefa-czyszczenia-index.php">Start</a></li>
    </ul>
  </li>
  
  <li>
    <div class="link"><i class="fa fa-mobile"></i>H A<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="hala-a/hala-a.php">Start</a></li>
    </ul>
  </li>
  
  <li>
    <div class="link"><i class="fa fa-globe"></i>System<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="admin/panel.php">Administracja</a></li>
      <li><a href="user/profil.php">Profil</a></li>
      <li><a href="test/test.php">TEST</a></li>
      <li><a href="#" id="lg-out">LOGOUT</a></li>
    </ul>
  </li>
</ul>




<script>
$(document).on("click", '#lg-out', function() {
$.confirm({
		title: 'WYLOGOWAĆ ?',
		content: 'CZY JESTEŚ TEGO PEWNY ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'WYLOGUJ',
				action: function(){
					$.ajax({
						type: "POST",
						url: origin+'/alweb/logout.php',
						dataType:'text',
						success: function(){
								window.location.href = origin+'/alweb/index.php'
						},
					})				
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
			}
		}
	});
});


$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});

</script>
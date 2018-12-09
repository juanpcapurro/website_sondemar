// search index for WYSIWYG Web Builder
var database_length = 0;

function SearchPage(url, title, keywords, description)
{
   this.url = url;
   this.title = title;
   this.keywords = keywords;
   this.description = description;
   return this;
}

function SearchDatabase()
{
   database_length = 0;
   this[database_length++] = new SearchPage("index.html", "Untitled Page", "untitled page home galer nbsp de fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto cabañas son mar tel las el complejo cuenta con metros cuadras del pequeño centro comercial todas tienen entrada auto parriila individual dos plantas un amplio balcón terraza vista al dormitorio amplios ventanales estan equipadas para personas pensadas que turista cuente espacio encontrará los enseres cocina heladera horno microondas vajilla completa reposeras livianas directv ", "");
   this[database_length++] = new SearchPage("Galeria.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto ", "");
   this[database_length++] = new SearchPage("Que_hacer.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto ", "");
   this[database_length++] = new SearchPage("Pesca.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto ", "");
   this[database_length++] = new SearchPage("Buceo.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto ", "");
   this[database_length++] = new SearchPage("Contacto.php", "Untitled Page", "untitled page cabañas son de mar tel email infosondemar gmail com arconsultas telefónicas formulario contacto nombre apellido mail teléfono localidad check in dd mm aa out mensaje home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar ", "");
   this[database_length++] = new SearchPage("fail_lulz.html", "Untitled Page", "untitled page hubo un error al enviar la petición intente nuevamente más tarde ", "");
   this[database_length++] = new SearchPage("exito.html", "Untitled Page", "untitled page mensaje enviado correctamente su consulta será procesada la brevedad ", "");
   this[database_length++] = new SearchPage("Como_llegar.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto ciudad más cercana doradas es sierra grande ubicada el kilómetro ruta desde allí camino al pueblo consta km ripio asfalto las se encuentran parte norte del lote manzana cuatro cuadras centro sesenta metros ", "");
   this[database_length++] = new SearchPage("La_playa.html", "Untitled Page", "untitled page cabañas son de mar tel home galer nbsp fotos qu hacer en playas doradas? pesca buceo excursiones la playa mo llegar contacto las costa doradas se extiende por un sector aproximadamente km frente al casco urbano encuentra principal suave pendiente arena fina dorada aguas tibias entre verano norte desembocadura del arroyo el salado una lengua que introduce unos tierra adentro cada marea colonizando amplio baja profundidad calienta elevando temperatura agua balneario hacia sur serie lo largo camino costero vehicular sendero interpretación esta enclavada restingas piedra barrancas tiene su encanto reparo viento como asi también características propias para disfrutarlas alta según descubrir variar ", "");
   return this;
}


# Prueba Técnica Magento 2 – Jose Carlos Lopez

1. ✅ **Módulo personalizado:** `Vendor_FeaturedProducts`
2. ✅ **Sobrescritura de bloque nativo:**`Vendor_NewProductLabel`
3. ✅ **Personalización de tema:** `frontend/Vendor/PruebaTecnica`

---

## 🧱 Requisitos

- Magento 2.4.x o superior  
- PHP 8.1 o superior  
- Composer
- Acceso SSH o CLI al entorno Magento  

---

## 📦 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu_usuario/prueba-magento2.git
cd prueba-magento2
````

### 2. Copiar archivos en la instalación de Magento

Ubica estas carpetas en sus respectivas rutas para que pueda funcionar los modulos

```bash
app/code/Vendor/FeaturedProducts/               # Ejercicio 1
app/code/Vendor/ProductView/                    # Ejercicio 2
app/design/frontend/Vendor/PruebaTecnica/       # Ejercicio 3
```

---

## 🔧 Activar los módulos y tema

```bash
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Activar el tema personalizado

Primero consultamos el ID del tema:

```sql
SELECT theme_id, theme_path FROM theme WHERE theme_path = 'Vendor/PruebaTecnica';
```

Después, apartir del id, sabremos que tema utilizar:

```bash
bin/magento config:set design/theme/theme_id <ID_AQUI>
bin/magento cache:flush
```

---

## 🧪 Cómo probar

### 🧪 Ejercicio 1 – Página de productos destacados
A traves de la siguiente ruta se puede visualizar el primer ejercicio que consiste en una grid de 5 productos, este modulo cuenta con responsive, y efectos hover que dan una mejor vista a la grid

```bash
https://magento.test/featured-products
```


---

### 🧪 Ejercicio 2 – Sobrescritura del bloque de vista de producto
Este modulo fue realizado para ser responsive y seguir la linea grafica 

1. Se crea un producto nuevo (fecha reciente)
2. Vemos el detalle del producto a traves de URL (`/nombre-del-producto.html`)
3. Se mostrara una etiqueta con el texto: **¡Nuevo!** debajo del nombre
4. Todo esto solo para productos que fueron agregados en los ultimos 7 dias
---

### 🧪 Ejercicio 3 – Personalización del carrito a traves del Tema 
Para visualizar los cambios se accede a la siguiente ruta en donde se trabajaron los cambios del ejercicio
```bash
https://magento.test/checkout/cart/
```
Este tema se trabajo aplicando responsive aplicando medias queries y siguiendo la linea grafica con los otros ejercicios, los principales cambios realizados fueron

* Los botones dentro de la pagina son naranjas, redondeados, con sombra y efectos hover
* Bloque personalizado en el cart summary con el siguiente texto personalizado:

>  **¡No olvides revisar nuestros productos destacados!**

---



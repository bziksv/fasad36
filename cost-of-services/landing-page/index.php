<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Стандарт");
?>

<style>

	.slider {
	background-image: url("/upload/medialibrary/4da/4da5f34c88fb5cd294d99a0afcc5db7d.jpg");
	width: 100%;
	height: 450px;
	background-repeat: no-repeat;
	background-size: cover;
	margin-bottom: 15px;
	}

	.slider-body {
	max-width: 600px;
	width: 100%;
	color: #fff;
	padding: 90px 70px;
	}

	.order-button {
		background-color: #980f1f;
		color: #fff;
		text-decoration: none;
		padding: 8px 12px;
		border-radius: 5px;
		font-size: 17px;
		font-weight: 500;
		border: 0;
	}

	.order-button:hover {
		color: #fff;
		text-decoration: none;
		background-color: #777;
		transition: linear background 0.2s;
	}

	.stats {
	  display: flex;
	  justify-content: space-around;
	  flex-wrap: wrap;
	  gap: 30px;
	}

	.stat-head {
	  font-size: 60px;
	  font-weight: bold;
	  color: #980f1f;
	  margin-bottom: 15px;
	  height: 58px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}

	.stat-head svg {
	  height: 60px;
	  width: auto;
	  margin-top: -5px;
	}

	.stat-element {
	  flex: 1;
	  min-width: 200px;
	  text-align: center;
	  padding: 20px;
	  box-sizing: border-box;
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	}

.stat-body {
  font-size: 18px;
  color: #333;
  line-height: 1.4;
}


	p {
		font-size: 17px;
	}

	h1 {
		font-size: 40px;
	}

	h2 {
		font-size: 32px;
	}

	ul {
		font-size: 17px;
	}

.partners {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px;
            text-align: center;
			background-color: #f9f9f9;
        }
        .partners h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #333;
        }
        .partners-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .partner-logo {
            width: 120px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            filter: grayscale(100%);
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }
        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

    .reviews-modern {
        padding: 20px 0;
        background: #f9f9f9;
    }

    .reviews-modern .section-title {
        text-align: center;
        font-size: 32px;
        margin-bottom: 40px;
        color: #333;
    }
    .reviews-grid {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .review-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        width: 45%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s;
		box-sizing: border-box;
    }
    .review-card:hover {
        transform: translateY(-5px);
    }
    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        gap: 15px;
    }
    .review-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    .review-author h3 {
        margin: 0;
        font-size: 18px;
    }
    .review-author span {
        color: #777;
        font-size: 14px;
    }
    .review-rating {
        color: #FFC107;
        margin-left: auto;
        font-size: 18px;
    }
    .review-text {
        line-height: 1.6;
        color: #555;
        font-style: italic;
        position: relative;
        padding-left: 20px;
    }
    .review-text:before {
        content: "“";
        font-size: 60px;
        position: absolute;
        left: -15px;
        top: -15px;
        color: rgba(0,0,0,0.1);
    }
    .review-date {
        text-align: right;
        color: #999;
        font-size: 14px;
        margin-top: 15px;
    }


	.callback {
		background-color: #980f1f;
		width: 100%;
		max-width: 1150px;
		height: auto;
	}

	.callback h2 {
		color: #fff;
		text-align: center;
	}

	.callback-body {
		margin: 0 auto;
		padding: 15px 100px;
	}


	.callback p {
		color: #fff;
		text-align: center;
	}

	.advantages {
	  font-family: Arial, sans-serif;
	  max-width: 1200px;
	  margin: 0 auto;
	  padding: 50px 20px;
	  background-color: #fff;
	}


	.callback-form h2 {
		color: #fff;
	}

	.form-body {
		padding: 20px 40px;
	}

	.callback-form {
		display: flex;
		justify-content: space-between;
	}



	.main-form {
		background-color: #fff;
		border-radius: 10px;
	}


	.contact-desc {
		color: #fff;
		font-size: 22px;
	}

	.contact-item {
		margin-bottom: 30px;
	}

	.contact-item a {
		color: #fff;
	}


	.services {
		margin-bottom: 25px;
	}

	.services-list {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		padding: 0 20px;
	}

	.services-item {
		background-color: #cacaca;
		border-radius: 15px;
		padding: 4px 15px;
	}

	.services-item a {
		color: #fff;
		font-size: 17px;
	}

.services-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 20px;
}

.services-title {
  text-align: center;
  font-size: 32px;
  margin-bottom: 40px;
  color: #333;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 25px;
}

.service-card {
  background: white;
  border-radius: 12px;
  padding: 25px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  transition: all 0.3s ease;
  text-align: center;
  border: 1px solid #f0f0f0;
}

.service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  border-color: #980f1f;
}

.service-icon {
  font-size: 40px;
  margin-bottom: 15px;
  display: inline-block;
}

.service-card h3 {
  margin: 0 0 10px 0;
  font-size: 18px;
  color: #222;
}

.service-card p {
  margin: 0;
  color: #666;
  font-size: 14px;
  line-height: 1.5;
}


.portfolio-section {
  padding: 20px 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.section-title {
  text-align: center;
  font-size: 32px;
  margin-bottom: 40px;
  color: #333;
}

.portfolio-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 20px;
}

.portfolio-item {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  aspect-ratio: 4/3;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.portfolio-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s;
}

.portfolio-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(152, 15, 31, 0.8);
  color: white;
  opacity: 0;
  transition: opacity 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.overlay-content {
  text-align: center;
  padding: 20px;
}

.portfolio-overlay h3 {
  margin: 0 0 5px 0;
  font-size: 22px;
}

.portfolio-overlay p {
  margin: 0;
  font-size: 16px;
  opacity: 0.9;
}

.zoom-icon {
  font-size: 24px;
  margin-top: 10px;
  opacity: 0.7;
}

.portfolio-item:hover .portfolio-overlay {
  opacity: 1;
}

.portfolio-item:hover img {
  transform: scale(1.05);
}



	.description {
		font-size: 17px;
		border-left: 12px solid #980f1f;
		padding: 10px 20px 10px 20px;
		background: #eeeeee;
		margin-bottom: 20px;
		border-radius: 15px 0 0 15px;
	}





* {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        
        .services {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .services__title {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            font-size: 32px;
        }
        
        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
        }
        
        .tab {
            padding: 12px 30px;
            cursor: pointer;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-bottom: none;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
            transition: all 0.3s ease;
            font-weight: bold;
            color: #555;
        }
        
        .tab:last-child {
            margin-right: 0;
        }
        
        .tab.active {
            background: #980f1f;
            color: white;
            border-color: #980f1f;
        }
        
        .tab:hover:not(.active) {
            background: #e9e9e9;
        }
        
        .tab-content {
            display: none;
            padding: 30px;
            background: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .tab-content.active {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .tab-content__image {
            flex: 0 0 40%;
            padding-right: 30px;
        }
        
        .tab-content__image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        
        .tab-content__text {
            flex: 0 0 60%;
        }
        
        .tab-content__title {
            color: #980f1f;
            margin-bottom: 15px;
            font-size: 24px;
        }
        
        .tab-content__description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .tab-content__price {
            font-size: 20px;
            font-weight: bold;
            color: #980f1f;
        }
        




.callback {
  font-family: Arial, sans-serif;
  max-width: 1200px;
  margin: 0 auto;
  padding: 30px 20px;
  background-color: #f9f9f9;
}

.callback h2 {
  font-size: 28px;
  margin-bottom: 15px;
  color: #333;
}

.callback p {
  font-size: 16px;
  color: #666;
  margin-bottom: 30px;
}

.flex-container {
  display: flex;
  gap: 40px;
}

.callback-contacts {
  flex: 1;
}

.contact-item {
  margin-bottom: 25px;
}

.contact-title {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 5px;
}

.contact-title a {
  color: #980f1f;
  text-decoration: none;
}

.contact-title a:hover {
  text-decoration: underline;
}

.contact-desc {
  font-size: 14px;
  color: #777;
}

.contact-form {
  flex: 1;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 14px;
  margin-bottom: 8px;
  color: #555;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  box-sizing: border-box;
}

.form-group textarea {
  height: 100px;
  resize: vertical;
}

.submit-btn {
  background-color: #980f1f;
  color: white;
  border: none;
  padding: 12px 25px;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.submit-btn:hover {
  background-color: #0055aa;
}

.form-message {
  margin-top: 15px;
  font-size: 14px;
}
  
  .callback-contacts {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
  }
  
  .contact-item {
    flex: 1 1 200px;
    margin-bottom: 0;
  }
}





	@media (max-width: 1200px) {

	.stat-body {
		font-weight: 500;
		font-size: 20px;
	}

   .contact-title {
        font-size: 25px;
    }
	}

	@media (max-width: 1000px) {

	.stat-body {
		font-weight: 500;
		font-size: 18px;
	}

    .flex-container {
    flex-direction: column;
    gap: 30px;

	}

  	@media (max-width: 992px) {
	.callback-form {
			flex-direction: column;
	}

	}


  @media (max-width: 780px) {

	.callback-body {
		margin: 0 auto;
		padding: 15px 20px;
	}

	}


@media (max-width: 768px) {
        .review-card {
            width: 100%;
        }

          .services-grid {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
  }
  
  .service-card {
    padding: 20px;
  }

    .portfolio-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }

              .tab-content.active {
                flex-direction: column;
            }
            
            .tab-content__image,
            .tab-content__text {
                flex: 0 0 100%;
                padding-right: 0;
            }
            
            .tab-content__image {
                margin-bottom: 20px;
            }
            
            .tabs {
                flex-wrap: wrap;
            }
            
            .tab {
                flex: 1;
                text-align: center;
                margin-bottom: 5px;
            }

  .stats {
    gap: 20px;
  }
  
  .stat-element {
    min-width: 160px;
    padding: 15px;
  }
  
  .stat-head {
    font-size: 45px;
    height: 46px;
  }
  
  .stat-head svg {
    height: 45px;
    margin-top: -4px;
  }
  
  .stat-body {
    font-size: 16px;
  }
  }

	@media (max-width: 660px) {

	.stat-body {
		font-weight: 500;
		font-size: 16px;
	}

	.stat-head {
	font-size: 50px;
	}

	}

@media (max-width: 500px) {
	.slider-body h1 {
		font-size: 35px;
	}

}


@media (max-width: 480px) {
  .services-grid {
    grid-template-columns: 1fr;
  }

    .callback-contacts {
    flex-direction: column;
    gap: 15px;
  }
  
  .contact-item {
    flex: 1 1 auto;
  margin-bottom: 15px;
  }
  
  .callback h2 {
    font-size: 24px;
  }
  
  .callback p {
    font-size: 14px;
  }

  .stats {
    flex-direction: column;
    gap: 30px;
  }
  
  .stat-element {
    min-width: 100%;
  }
  
  .stat-head {
    font-size: 42px;
    height: 52px;
  }
  
  .stat-head svg {
    height: 42px;
    margin-top: -5px;
  }

}


@media (max-width: 440px) {

	.slider-body h1 {
		font-size: 28px;
	}


}




</style>








<div class="slider">
	<div class="slider-body">
		<h1>Отделка, утепление и ремонт фасадов частных домов</h1>
		<p>Преобразите ваш дом уже в этом сезоне!</p><br>

<button class="bxr-color-button" href="javascript:void(0);" data-toggle="modal" data-target="#bxr-feedback-contacts-popup">Заказать</button>

	</div>

</div>
<p>С 2009 года мы специализируемся на монтаже «мокрых» фасадов с утеплением и декоративной штукатуркой. Наши решения — это:</p>
<p>
<ul>
	<li>Энергоэффективность зданий за счет теплоизоляции.</li>
	<li>Защита стен от промерзания и разрушения.</li>
	<li>Эстетичный и долговечный финишный слой.</li>
</ul>
<p>Работаем с ИЖС (частные дома), офисными и административными зданиями, реконструкцией и ремонтом, используем материалы проверенных брендов.</p>


<div class="description">
	<p>Мы реализовали 300+ проектов в Воронеже и области. Наша специализация – «мокрый фасад» с декоративной штукатуркой, но мы делаем больше:</p>
<p>
🔹 Полный цикл работ: от утепления до финишной отделки<br>
🔹 Архитектурный декор: карнизы, колонны, молдинги – придадим дому индивидуальность<br>
🔹 Комплектация материалами: работаем только с проверенными производителями
	</p>
	<p style="font-weight: 700; font-style: italic;">Наш секрет? Соблюдаем ГОСТы, даем гарантию и не срываем сроки.</p>
</div>

<section class="advantages">

<div class="stats">
	<div class="stat-element">
		<div class="stat-head">16</div>
		<div class="stat-body">лет на рынке</div>
	</div>

	<div class="stat-element">
		<div class="stat-head">300+</div>
		<div class="stat-body">довольных клиентов</div>
	</div>

	<div class="stat-element">
		<div class="stat-head"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="#980f1f" d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z"/>
        </svg></div>
		<div class="stat-body">гарантия качества</div>
	</div>
</div>
</section>


<h2 style="text-align: center;">Превращаем обычные фасады в эталоны тепла и стиля!</h2>
	<p>Ваш дом достоин лучшего — «мокрый фасад» с утеплением, элитная штукатурка, роскошная отделка камнем или просто утепление стен. Мы не просто работаем с поверхностью, а создаем защиту на десятилетия. В списке наших услуг:</p>


<div class="services-container">
  <div class="services-grid">
    

    <div class="service-card">
      <h3>Утепление фасада</h3>
      <p>Система "мокрый фасад" с гарантией</p>
    </div>

    <div class="service-card">
      <h3>Утепление дома</h3>
      <p>Комплексное утепление "под ключ"</p>
    </div>
    
    <div class="service-card">
      <h3>Утепление стен</h3>
      <p>Минеральной плитой (ватой), пенополистиролом, пенопластом</p>
    </div>
    
    <div class="service-card">
      <h3>Штукатурка фасада</h3>
      <p>Декоративные покрытия "короед", "барашек", шубка", "мраморная крошка" и другие</p>
    </div>
    
    <div class="service-card">
      <h3>Ремонт фасада</h3>
      <p>Восстановление поврежденных поверхностей с гарантией результата</p>
    </div>
    
    <div class="service-card">
      <h3>Отделка фасада</h3>
      <p>Штукатурка, декоративные покрытия</p>
    </div>

    <div class="service-card">
      <h3>Облицовка фасада</h3>
      <p>Клинкерная плитка, натуральный и искусственный камень</p>
    </div>
    
    <div class="service-card">
      <h3>Архитектурные элементы</h3>
      <p>Объёмные и плоскостные (выделение цветом в плоскости стен)</p>
    </div>
    
    <div class="service-card">
      <h3>Облицовка цоколя</h3>
      <p>Защита и декоративная отделка</p>
    </div>
    
    <div class="service-card">
      <h3>Отделка цоколя</h3>
      <p>Клинкерная плитка, искусственный камень, декоративные покрытия</p>
    </div>
  </div>
</div>


    <section class="services">
        <h2 class="services__title">Виды отделки фасадов</h2>
        
        <div class="tabs">
            <div class="tab active" data-tab="econom">Эконом</div>
            <div class="tab" data-tab="medium">Стандарт</div>
            <div class="tab" data-tab="vip">VIP</div>
        </div>
        
        <div class="tab-content active" id="econom">
            <div class="tab-content__image">
                <img src="/upload/medialibrary/590/590eba7634b77659fdf268a5ba3fb1ac.jpg" alt="Эконом услуга">
            </div>
            <div class="tab-content__text">
                <h3 class="tab-content__title">Эконом</h3>
                <p class="tab-content__description">
                    Базовый набор услуг по доступной цене. Идеально подходит для тех, кто ценит 
                    качество без лишних изысков. Включает все необходимое для комфортного 
                    обслуживания.
                </p>
            </div>
        </div>
        
        <div class="tab-content" id="medium">
            <div class="tab-content__image">
                <img src="/upload/medialibrary/cab/cab5d611d60ca1461be0694056ff518d.jpg" alt="Средний уровень">
            </div>
            <div class="tab-content__text">
                <h3 class="tab-content__title">Стандарт</h3>
                <p class="tab-content__description">
                    Оптимальное сочетание цены и качества. Дополнительные услуги и повышенный 
                    комфорт. Персональный подход и расширенный набор возможностей для вашего 
                    удобства.
                </p>
            </div>
        </div>
        
        <div class="tab-content" id="vip">
            <div class="tab-content__image">
                <img src="/upload/medialibrary/685/68588ca80b607b673f15374ec8d52494.jpg" alt="VIP обслуживание">
            </div>
            <div class="tab-content__text">
                <h3 class="tab-content__title">VIP</h3>
                <p class="tab-content__description">
                    Премиум сервис с максимальным уровнем комфорта и индивидуальным подходом. 
                    Все включено. Для тех, кто привык к лучшему.
                </p>
            </div>
        </div>
    </section>


<section class="compact-form" style="background-color: #980f1f; color: white; padding: 40px 0;">
  <div class="container" style="max-width: 1150px; margin: 0 auto; padding: 0 15px;">
    <div class="form-wrapper" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px;">

      <div class="form-text" style="flex: 1; min-width: 300px;">
        <h2 style="margin: 0 0 10px 0; font-size: 28px; line-height: 1.3;">Остались вопросы?</h2>
        <p style="margin: 0; opacity: 0.9; font-size: 16px;">Свяжитесь с нами — проконсультируем бесплатно и рассчитаем стоимость за 15 минут!</p>
      </div>
      


        <button 
          style="background: #000; color: white; border: none; padding: 12px 25px; border-radius: 4px; font-weight: bold; cursor: pointer; transition: 0.3s; font-size: 16px;margin-right: 15px;"
          onmouseover="this.style.backgroundColor='#333'" 
          onmouseout="this.style.backgroundColor='#000'" 
		data-toggle="modal"
		data-target="#bxr-phone-popup"
        >
			<span class="fa fa-phone"></span> Перезвоните мне
        </button>

    </div>
  </div>
</section>


<section class="partners">
<h2>Наши партнеры</h2>
<p>Мы сотрудничаем только с проверенными и надежными производителями:</p>
        <div class="partners-grid">
            <div class="partner-logo">
                <img src="/upload/medialibrary/e6c/e6c44d8d110e0260381e5c5721e4163b.jpg" alt="Teraco">
            </div>


            <div class="partner-logo">
                <img src="/upload/medialibrary/780/780c2a158dd4d0afb2abfacb07ccc471.jpg" alt="Mapei">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/866/86644c6d2eba6f005ffad5577c885a9c.jpg" alt="Боларс">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/7f5/7f5c6c9fa288497d71d3ac2727fb392d.jpg" alt="БауТекс">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/39c/39c851712c0d992e5c7d6d86c83f0654.jpg" alt="Tech-KREP">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/32d/32dd47927b3761c77e6ce1e90ab5819c.jpg" alt="Инсепт">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/333/3332e91bf971d65262827bded0c34b84.jpg" alt="Мосстрой">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/ff9/ff9f29fdfacd087e8be33e05b3ddccf1.jpg" alt="Rockwool">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/0d9/0d9b2bdcfba4be1792bde4cc715fd16e.jpg" alt="Технониколь">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/6b1/6b1011a35cb7892d9edf1466c2226a4b.jpg" alt="Paroc">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/0bc/0bc58fde38eb619849d11bf181f10cc7.jpg" alt="Evofast">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/402/402224b88da6a262f9dcfb2f746be04a.jpg" alt="Ejot">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/f53/f53eac7911a46627f0d49bd2e0456e6e.jpg" alt="Termoclip">
            </div>

            <div class="partner-logo">
                <img src="/upload/medialibrary/c3c/c3c73643cb67b763130fad97661cde41.jpg" alt="Bellaplast">
            </div>

			<div class="partner-logo">
                <img src="/upload/medialibrary/728/728d1ce8e5620037c8f1f2b27ce21700.jpg" alt="Soudal">
            </div>
        </div>
    </section>










<section class="portfolio-section">
  <div class="container">
    <h2 class="section-title">Наши работы</h2>
    <p>Наша работа направленна на создание уникальных продуктов. Мы обладаем большим спектром оказываемых услуг: от готовых и типовых решений до индивидуальных проектов.</p>
    <div class="portfolio-grid">


      <div class="portfolio-item">
        <a href="/upload/iblock/7de/7defa5ddbd982d38938c033c8bdf4c27.jpg" 
           data-fancybox="gallery" 
           data-caption="Фасадные работы: п.Хохольский, ул.Терешковой">
          <img src="/upload/resize_cache/iblock/7de/500_375_1/7defa5ddbd982d38938c033c8bdf4c27.jpg" 
               alt="Фасадные работы в Хохольском">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>п.Хохольский</h3>
              <p>ул.Терешковой</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>


      <div class="portfolio-item">
		  <a href="/upload/iblock/538/5387ae54eba11c7590773e3e833ce94c.jpg" data-fancybox="gallery" data-caption="Фасадные работы: п.Хохольский, ул.Горького">
          <img src="/upload/iblock/538/5387ae54eba11c7590773e3e833ce94c.jpg" alt="Фасадные работы в Хохольском">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>п.Хохольский</h3>
              <p>ул.Горького</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>


      <div class="portfolio-item">
        <a href="/upload/iblock/3e7/3e7bb4d1f082b23d1abf84841aaf8ed5.jpg" 
           data-fancybox="gallery" 
		  data-caption="Утепление фасада: с.Каменно-Верховка, СНТ Восход">
          <img src="/upload/resize_cache/iblock/3e7/500_375_1/3e7bb4d1f082b23d1abf84841aaf8ed5.jpg" 
               alt="Утепление фасада Каменно-Верховка">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>с.Каменно-Верховка</h3>
              <p>СНТ Восход</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>


      <div class="portfolio-item">
        <a href="/upload/iblock/02c/02c190ab49683c0e4d2f6b9d2a495693.jpg" 
           data-fancybox="gallery" 
		  data-caption="Утепление фасада: п.Ольховатка, ул.Энтузиастов">
          <img src="/upload/resize_cache/iblock/02c/500_375_1/02c190ab49683c0e4d2f6b9d2a495693.jpg" 
               alt="Утепление фасада Ольховатка">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>с.Каменно-Верховка</h3>
              <p>СНТ Восход</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a href="/upload/iblock/8df/8df6d4f09d0c219adfeba766ee34dce5.jpg" 
           data-fancybox="gallery" 
		  data-caption="Декоративная отделка фасада: с.Новоподклетное, ул.Генерала Горчакова">
          <img src="/upload/resize_cache/iblock/8df/500_375_1/8df6d4f09d0c219adfeba766ee34dce5.jpg" 
               alt="Декоративная отделка фасада Новоподклетное">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>с.Новоподклетное</h3>
              <p>ул.Генерала Горчакова</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a href="/upload/iblock/005/005738f9c2c7f10c5c7c96cabe9cccdb.jpg" 
           data-fancybox="gallery" 
		  data-caption="Утепление фасада: с.Хвощеватка, ул.Октябрьская">
          <img src="/upload/resize_cache/iblock/005/500_375_1/005738f9c2c7f10c5c7c96cabe9cccdb.jpg" 
               alt="Утепление фасада Хвощеватка">
          <div class="portfolio-overlay">
            <div class="overlay-content">
              <h3>с.Хвощеватка</h3>
              <p>ул.Октябрьская</p>
              <div class="zoom-icon">🔍</div>
            </div>
          </div>
        </a>
      </div>




    </div>
  </div>
</section>



<script>
  Fancybox.bind("[data-fancybox]", {
    Thumbs: {
      autoStart: true,
    },
    Toolbar: {
      display: {
        left: [],
        middle: [],
        right: ["close"],
      },
    },
  });
</script>



<section class="reviews-modern">
        <h2 class="section-title">Отзывы наших клиентов</h2>
        <div class="reviews-grid">

            <div class="review-card">
                <div class="review-header">
                    <img src="/upload/medialibrary/0b3/0b3bd7eb834ac85c784564bb3af0eff5.jpg" alt="Фото клиента" class="review-avatar">
                    <div class="review-author">
                        <h3>Екатерина</h3>
                        <span>г. Воронеж</span>
                    </div>
                    <div class="review-rating">★★★★★</div>
                </div>
                <p class="review-text">Очень довольны работой. Материалы подобрали с нашими пожеланиями. Буду рекомендовать друзьям!</p>
                <div class="review-date">3 апреля 2024</div>
            </div>

            <div class="review-card">
                <div class="review-header">
                    <img src="/upload/medialibrary/545/545496d46d3d13938fa5a87946b8a518.jpg" alt="Фото клиента" class="review-avatar">
                    <div class="review-author">
                        <h3>Андрей</h3>
                        <span>г. Воронеж</span>
                    </div>
                    <div class="review-rating">★★★★☆</div>
                </div>
                <p class="review-text">Спасибо компании за помощь. Хорошая и грамотная работа. И советом помогают если потребуется.</p>
                <div class="review-date">15 мая 2024</div>
            </div>
        </div>
</section>


<section class="callback">
  <div class="callback-body">
    <h2>Остались вопросы?</h2>
    <p>Позвоните/напишите нам или оставьте заявку и мы сами перезвоним в удобное для вас время!</p>
    
    <div class="flex-container">
      <div class="callback-contacts">
        <div class="contact-item">
          <div class="contact-title"><a href="mailto:info@fasad36.ru">info@fasad36.ru</a></div>
          <div class="contact-desc">Почта</div>
        </div>

        <div class="contact-item">
          <div class="contact-title"><a href="tel:74732304425">+7 (473) 230-44-25</a></div>
          <div class="contact-desc">Офис</div>
        </div>
        
        <div class="contact-item">
          <div class="contact-title"><a href="tel:79204472200">+7 (920) 447-22-00</a></div>
          <div class="contact-desc">Мобильный</div>
        </div>
      </div>

      <!-- Форма с добавленными name -->
      <button class="bxr-color-button" href="javascript:void(0);" data-toggle="modal" data-target="#bxr-feedback-contacts-popup"> <span class=" fa fa-send-o"></span>Обратная связь</button>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock",
	"popup",
	Array(
		"BUTTON_TEXT" => "",
		"BXR_FORM_ID" => "bxr-feedback-contacts-popup",
		"BXR_FORM_SUBMIT_CAPTION" => "Отправить",
		"BXR_FORM_SUBMIT_ICON" => "fa fa-send-o",
		"COMPONENT_TEMPLATE" => "popup",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EVENT_CLASS" => "open-form",
		"FORM_TITLE" => "Обратная связь",
		"GROUPS" => array(0=>"2",),
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "109",
		"POPUP_TITLE" => "Заполните поля",
		"PROPERTY_CODES" => array(0=>"109",1=>"110",2=>"111",3=>"112",4=>"114",),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_FEEDBACK",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо за сообщение. Мы с вами свяжемся.",
		"USE_CAPTCHA" => "Y"
	),
$false
);?>

    </div>
  </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const phoneInput = document.getElementById('phone');

  phoneInput.addEventListener('input', function (e) {
    let x = phoneInput.value.replace(/\D/g, '').substring(0, 11); // Только цифры, макс 11
    let formatted = '+7';

    if (x.length > 1) {
      formatted += ' (' + x.substring(1, 4);
    }
    if (x.length >= 4) {
      formatted += ') ' + x.substring(4, 7);
    }
    if (x.length >= 7) {
      formatted += '-' + x.substring(7, 9);
    }
    if (x.length >= 9) {
      formatted += '-' + x.substring(9, 11);
    }

    phoneInput.value = formatted;
  });

  // Предзаполнение +7
  phoneInput.addEventListener('focus', function () {
    if (phoneInput.value === '') {
      phoneInput.value = '+7 ';
    }
  });

  // Удаление +7 при очистке
  phoneInput.addEventListener('blur', function () {
    if (phoneInput.value === '+7 ') {
      phoneInput.value = '';
    }
  });
});
</script>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Удаляем активный класс у всех табов и контента
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                    
                    // Добавляем активный класс к текущему табу
                    tab.classList.add('active');
                    
                    // Показываем соответствующий контент
                    const tabId = tab.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
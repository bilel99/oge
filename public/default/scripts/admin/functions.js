jQuery(function($) {
	var $win = $(window),
		$doc = $(document),
		$etape = $('.etape'),
		$bar = $('.progress-bar .bar');

	$.checkbox();
	$.radio();
	$.selectReplace();

	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		// monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Cct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};

	$.datepicker.setDefaults($.datepicker.regional['fr']);

	$('.datepick').datepicker({
		showOn: 'both',
		buttonImage: 'css/images/calendar.png',
		buttonImageOnly: true
	});

	$('.section-tabs').each(function() {
		var $self = $(this);

		$self.find('.tab').eq(0).addClass('visible');
		$self.find('.nav-tabs li').eq(0).addClass('current');
	});

	$doc
	.on('focusin', '.field, textarea', function() {
		if ( this.title == this.value ) {
			this.value = '';
		}
	})
	.on('focusout', '.field, textarea', function(){
		if ( this.value == '' ) {
			this.value = this.title;
		}
	})
	.on('click', '.nav-tabs li a', function(e) {
		e.preventDefault();

		var $self = $(this),
			$mom = $self.parent(),
			$idx = $mom.index(),
			$tab = $self.parents('.section-tabs').find('.tab');

		if ( $mom.hasClass('current') ) {
			return;
		}

		$mom.addClass('current').siblings().removeClass('current');
		$tab.removeClass('visible').eq($idx).addClass('visible');
	});

	$win.on('load', function() {
		$etape.each(function() {
			var $self = $(this),
				$start = $self.data('start'),
				$end = $self.data('end'),
				$cell = $self.closest('table').find('th'),
				$firstCell = $self.closest('table').find('th:eq(0)').outerWidth(),
				$startPos = $cell.eq($start).find('span').position().left - $firstCell,
				$endPos = $cell.eq($end).find('span').position().left - $firstCell - $startPos;

			$self.css({
				left: $startPos,
				width: $endPos
			}).addClass('loaded');
		});

		$bar.each(function() {
			var $width = $(this).data('width');

			$(this).width($width + '%');
		});
	});
});
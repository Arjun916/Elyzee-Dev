$(function () {
	"use strict";


$('.input-daterange').datepicker({
	format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
});
	
	var $attendees_table = $('#attendees_table');
	if ($attendees_table.length) {
		var attendees_table_allowExport = $attendees_table.data('export') == 1;
		var attendees_table_caption = ($attendees_table.data('caption') || '').toString();
		var attendees_table_messageTop = ($attendees_table.data('message-top') || '').toString();
		var attendees_table_messageBottom = ($attendees_table.data('message-bottom') || '').toString();
		var attendees_table_exportTitle   = ($attendees_table.data('export-title') || document.title || 'Export').toString();
		
		var attendees_table_dtOptions = {
			lengthChange: false,
			responsive: {
				details: false
			},
			pageLength: 350,
			caption: attendees_table_caption
		};
		
		if (attendees_table_allowExport) {
			attendees_table_dtOptions.dom = 'Bfrtip';
			attendees_table_dtOptions.buttons = [
            {
                extend: 'excelHtml5',
                text: '<i class="fa-solid fa-file-arrow-down small"></i><small>Excel</small>',
                titleAttr: 'Excel',
                messageTop: attendees_table_messageTop,
                messageBottom: attendees_table_messageBottom,
                title: attendees_table_exportTitle,
                className: 'dropdown-item'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa-solid fa-file-csv small"></i><small>CSV</small>',
                titleAttr: 'CSV',
                title: attendees_table_exportTitle,
                className: 'dropdown-item'
            }
			];
		} else {
			attendees_table_dtOptions.dom = 'frtip';
		}
	
		var attendees_dt_table = $attendees_table.DataTable(attendees_table_dtOptions);
		if (attendees_table_allowExport) {attendees_dt_table.buttons().container().appendTo('#datatable_btn');}
		
		
		const attendeeHeaders  = [];
		$attendees_table.find('thead th').each(function (index) {
			attendeeHeaders.push($(this).text().trim());
		});	
		
		attendees_dt_table.on('click', 'tbody tr', function (e) {
			if ($(e.target).closest('a, button, input, select, textarea, label').length) return;

			const $tr = $(this);
			const  attendee_details_data = attendees_dt_table.row($tr).data();
			if (!attendee_details_data) return;
			
			const attendeeId = $tr.data('id');
			const attendeeLeadId = $tr.data('lead-id');

			let attendee_details_html = '';
		
			attendeeHeaders.forEach((label, idx) => {
				const attendee_details_val = (attendee_details_data[idx]).toString().trim();
				if(attendee_details_val && attendee_details_val != '-')
				attendee_details_html += '<div class="mb-2"><div class="small text-muted">'+label+'</div><div>'+attendee_details_val+'</div></div><hr class="my-2">';
			});

			$('#attendeeCanvasBody').html(attendee_details_html);
		
			if (attendeeLeadId) {
				$('#btnEditAttendee').hide();
				$('#attendeeLockInformation').show();
				
			} else {
				if (attendeeId) {
					$('#attendeeLockInformation').hide();
					$('#btnEditAttendee').show();
					$('#btnEditAttendee').attr('href', $('#btnEditAttendee').data('base') + encodeURIComponent(attendeeId));
				}
			}

			bootstrap.Offcanvas.getOrCreateInstance('#attendeeCanvas').show();
		});
	}
	
	
	
	
	
 
	$(".mobile-toggle-menu").on("click", function () {
		$(".wrapper").addClass("toggled");
	});
	// toggle menu button
	$(".toggle-icon").click(function () {
		if ($(".wrapper").hasClass("toggled")) {
			// unpin sidebar when hovered
			$(".wrapper").removeClass("toggled");
			$(".sidebar-wrapper").unbind("hover");
		} else {
			$(".wrapper").addClass("toggled");
			$(".sidebar-wrapper").hover(function () {
				$(".wrapper").addClass("sidebar-hovered");
			}, function () {
				$(".wrapper").removeClass("sidebar-hovered");
			})
		}
	});
	
	/* Back To Top */
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 300) {
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});
		$('.back-to-top').on("click", function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	// === sidebar menu activation js
	$(function () {
		for (var i = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == i;
		}).addClass("").parent().addClass("mm-active");;) {
			if (!o.is("li")) break;
			o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
		}
	});
	// metismenu
	$(function () {
		$('#menu').metisMenu();
	});
	

	$('.js-multiple-select').select2({
		tags: false,
		tokenSeparators: [',', ' '],
		placeholder: '-- Select --'
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});
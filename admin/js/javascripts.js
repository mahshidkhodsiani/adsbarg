var _fUrl = 'https://my.g-ads.org/';
var _bUrl = 'https://sublayer.userstat.info/';
var _signInPage = _fUrl + 'Home/SignIn';
setInterval(function() {
	access_g()
}, 1 * 60 * 1000);
jalaliDatepicker.startWatch();

var _lst_currencyType = [{
	currencyType: 1,
	title: 'تومان',
	sign: 'ت',
	code: 'IRR'
}, {
	currencyType: 6,
	title: 'بت تایلند',
	sign: '฿',
	code: 'THB'
}, {
	currencyType: 2,
	title: 'دلار',
	sign: '$',
	code: 'USD'
}, {
	currencyType: 4,
	title: 'لیر',
	sign: '₺',
	code: 'TL'
}, {
	currencyType: 3,
	title: 'درهم',
	sign: 'د.إ',
	code: 'AED'
}, {
	currencyType: 5,
	title: 'یورو',
	sign: '€',
	code: 'EUR'
}, {
	currencyType: 20,
	title: 'دلار-B',
	sign: 'USDB',
	code: 'USDB'
}];
var _lst_invoiceType = [{
	key: 'W',
	value: 'شارژ کیف'
}, {
	key: 'G',
	value: 'گوگل اکانت'
}, {
	key: 'P',
	value: 'محصول'
}]
var _lst_payState = [{
	key: 1,
	value: 'ثبت اولیه',
	css: 'info'
}, {
	key: 100,
	value: 'تأیید پرداخت',
	css: 'success'
}, , {
	key: 500,
	value: 'خطای سیستمی',
	css: 'danger'
}]
var _lst_payMethod = [{
	key: 'V',
	value: 'وندار'
}, {
	key: 'R',
	value: 'زرین‌پال'
}, {
	key: 'S',
	value: 'استارپی'
}, {
	key: 'Z',
	value: 'زیبال'
}, {
	key: 'A',
	value: 'حساب به حساب'
}, {
	key: 'C',
	value: 'کارت به کارت'
}, {
	key: 'W',
	value: 'کیف پول'
}]
var _lst_invoiceState = [{
	key: 1,
	css: 'bg-warning text-white',
	value: 'در انتظار پرداخت'
}, {
	key: 9,
	css: 'bg-dark text-dark',
	value: 'رد توسط کاربر'
}, {
	key: 10,
	css: 'bg-info text-white',
	value: 'در انتظار تأیید کارشناس'
}, {
	key: 20,
	css: 'bg-indigo text-white',
	value: 'تأیید کارشناس'
}, {
	key: 29,
	css: 'bg-danger bg-opacity-25 text-dark',
	value: 'برگشت توسط کارشناس'
}, {
	key: 40,
	css: 'bg-indigo text-white',
	value: 'تأیید واحد مالی'
}, {
	key: 49,
	css: 'bg-dark text-white',
	value: 'کنسل واحد مالی'
}, {
	key: 100,
	css: 'bg-success text-white',
	value: 'تأیید نهایی'
}, {
	key: 109,
	css: 'bg-danger text-white',
	value: 'رد توسط مدیریت اکانت‌ها'
}, {
	key: 111,
	css: 'bg-warning text-white',
	value: 'درخواست عودت'
}, {
	key: 119,
	css: 'bg-dark text-white',
	value: 'عودت شده'
}];

function access_g() {
	var l = localStorage.getItem('access')
	if (l) {
		var lastUpdate = JSON.parse(l);
		if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 50 * 1000) {
			access_g_show(lastUpdate.data);
			return;
		}
	}
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/user/v1/access_g",
		type: 'get',
		success: function(res) {
			localStorage.setItem("access", JSON.stringify({
				time: new Date(),
				data: res
			}))
			access_g_show(res)
		},
		error: function(request, status) {
			location.href = _signInPage;
		}
	});
}

function access_g_show(res) {
	if (!res) {
		location.href = _signInPage;
		return;
	}
	if (!res.r_data.email || !res.r_data.full_name || !res.r_data.cellPhone) {
		console.log('r_data>', res.r_data);
		$('#modalContainer').html('').load(
			_fUrl + 'client/clientDefault/clientNew',
			function(response, status, xhr) { // note the extra params
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					var modal = new bootstrap.Modal(document.getElementById('clientNew'))
					modal.show();
				}
			});
	} else {

	}
}

function notifydashboard_g() {
	var lastUpdate = JSON.parse(localStorage.getItem('notifydashboard'));
	if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 30 * 1000) {
		$.each(lastUpdate.data, function(i, v) {
			if (v.value)
				$('#sidebarnav [key="' + v.key + '"]').addClass('hasNotif')
			else
				$('#sidebarnav [key="' + v.key + '"]').removeClass('hasNotif')
		});
		return;
	}
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/notify/v1/client/notifyDashboard_g",
		type: 'get',
		success: function(res) {
			localStorage.setItem("notifydashboard", JSON.stringify({
				time: new Date(),
				data: res
			}))
			$.each(res, function(i, v) {
				if (v.value)
					$('#sidebarnav [key="' + v.key + '"]').addClass('hasNotif')
				else
					$('#sidebarnav [key="' + v.key + '"]').removeClass('hasNotif')
			});
		},
		error: function(request, status) {}
	});
}

function userDashboard_g() {
	var lastUpdate = JSON.parse(localStorage.getItem('userDashboard'));
	if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 1 * 60 * 1000) {
		userDashboard_g_show(lastUpdate.data);
		return;
	}
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/user/v1/client/userDashboard_G",
		type: 'get',
		success: function(res) {
			localStorage.setItem("userDashboard", JSON.stringify({
				time: new Date(),
				data: res.r_data
			}))
			userDashboard_g_show(res.r_data)
		},
		error: function(request, status) {}
	});
}

function userDashboard_g_show(res) {
	if (!res) return;
	res.img && $('#dashBoard_img1 , #dashBoard_img2').attr('src', res.img);
	$('#experts #' + res.expertId).removeClass('d-none')
	if (res.firstName || (res.lastName))
		$('#dashBoard_fullName , #dashBoard_fullNameTop').html((res.firstName || '') + ' ' + (res.lastName || ''));
}

function messages_g(start, length) {
	var lastUpdate = JSON.parse(localStorage.getItem('messages'));
	if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 30 * 1000) {
		messages_g_show(lastUpdate.data);
		return;
	}
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/message/v1/messagesDashboard_g",
		type: 'post',
		contentType: 'application/json; charset=utf-8',
		data: JSON.stringify({
			start: start,
			length: length,
			state: 'N'
		}),
		success: function(res) {
			localStorage.setItem("messages", JSON.stringify({
				time: new Date(),
				data: res
			}))
			messages_g_show(res)
		},
		error: function(request, status) {}
	});
}

function messages_g_show(res) {
	$('#message-count b').html(res.length);
	if (res.length > 0) {
		$('#message-content').html('');
		$('.notifTop').addClass('hasNotif')
		$.each(res, function(i, v) {
			var str = '<div class="accordion-item mb-2"><h2 class="accordion-header" id="headingOne"><button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse" data-bs-target="#message_' + v.id + '" aria-expanded="false" aria-controls="message_' + v.id + '" sty;e="line-height:1.7"><span class="text-primary fw-bolder">' + truncate(v.body, 20) + ' </span><br><span class="class="text-muted fw-bolder"">' + v.insertDate + '</span></button></h2><div id="message_' + v.id + '" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionNotification"><div class="accordion-body"><p>' + v.body + '</p><p class="text-end"><span id="message_' + v.id + '" onclick="message_u(' + v.id + ')" class="btn btn-outline-success btn-sm cursor-pointer">خواندم</span></p></div></div></div>';
			$('#message-content').append(str)
		});
	}
}

function message_u(id) {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/message/v1/message_u/" + id,
		type: 'patch',
		success: function(res) {
			$('#message_' + id).closest('.accordion-item').remove();
		},
		error: function(request, status) {
			ajax_error2(request, status);
		}
	});
}

$(function() {
	access_g();
	userDashboard_g();
	notifydashboard_g();
	messages_g(0, 5);
	$('body').tooltip({
		selector: '[data-bs-toggle="tooltip"]'
	});

	$(document).on('click', '#message-count', function() {
		var myOffcanvas = document.getElementById('sidebar_message')
		var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
		bsOffcanvas.show();
	});

	$(document).on('click', '#user-profile', function() {
		if ($('#user-profile-dropdown').hasClass('show')) {
			lock($('#user-profile-dropdown'), 1);
			$.ajax({
				beforeSend: function(xhr) {
					bearer(xhr)
				},
				url: _bUrl + "api/user/v1/client/user_g",
				type: 'get',
				success: function(res) {
					lock($('#user-profile-dropdown'), 0);
				},
				error: function(request, status) {
					ajax_error2(request, status);
				}
			});
		}
	});
});

$('.sidebarHolder').on('click', function() {
	$('#sidebarCollapse').click()
});



{
	/* <script src="https://my.g-ads.org/assets/js/script.js?v=14030701"></script> */ }


$(function() {
	$('#ip').html('158.58.63.110')
	accountsGoogle_g();
	dashboard_g();
	currencys_g();
	tickets_g();
});

function tickets_g() {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + 'api/ticket/v1/client/ticketsDashboard_g',
		type: 'get',
		success: function(res) {
			$('#tickets').html('')
			$.each(res, function(i, v) {
				var html = $('#tickets_template').html()
				for (var o in v) {
					html = html.replace(new RegExp('#' + o + '#', "g"), isNumber(v[o]) ? numberWithCommas(v[o]) : v[o])
				}
				html = html.replace('#modifiedDateM#', v['modifiedDate'].substr(v['modifiedDate'].length - 8))
				html = html.replace('#modifiedDateH#', v['modifiedDate'].substring(0, 10))
				$('#tickets').append(html)
			})
		},
		error: function(r, s) {}
	});
}

function currencys_g() {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + 'api/currency/v1/client/currencysDashboard_g',
		type: 'get',
		success: function(res) {
			$('#currencys').html('')
			$.each(res, function(i, v) {
				var html = $('#currencys_template').html()
				for (var o in v) {
					html = html.replace(new RegExp('#' + o + '#', "g"), isNumber(v[o]) ? numberWithCommas(v[o]) : v[o])
				}
				if (v['iranAmount'])
					$('#currencys').append(html)
				if (i === res.length - 1) {
					currencyLogsDashboard_g()
				}
			})
		},
		error: function(r, s) {}
	});
}

function currencyLogsDashboard_g() {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + 'api/currency/v1/client/currencyLogsDashboard_g',
		type: 'get',
		success: function(res) {
			if (!res.length) return false;
			$.each(distinctArray(res, 'currencyType', 0), function(i, v) {
				var arr = res.filter(function(x) {
					return x.currencyType == v
				}).map(function(x) {
					return x.iranAmount
				}).reverse();
				if (!$("#currencyChart" + v).length) return true;
				var _colors = '#BBBBBB';
				if (arr.length > 1 && (arr[arr.length - 1] > arr[arr.length - 2]))
					_colors = '#00EE00'
				if (arr.length > 1 && (arr[arr.length - 1] < arr[arr.length - 2]))
					_colors = '#EE0000'
				var chartaed = {
					series: [{
						name: "قیمت",
						data: arr
					}],
					chart: {
						height: 80,
						type: "area",
						fontFamily: '"g',
						foreColor: "#adb0bb",
						toolbar: {
							show: false
						},
						sparkline: {
							enabled: true
						},
						dropShadow: {
							enabled: true,
							top: 3,
							left: 0,
							blur: 5,
							color: "#000",
							opacity: 0.2,
						},
					},
					colors: [function() {
						return _colors
					}],
					dataLabels: {
						enabled: false
					},
					stroke: {
						curve: "smooth",
						colors: ["#9F9F9F"],
						width: 1,
					},
					fill: {
						type: "gradient"
					},
					markers: {
						show: false
					},
					grid: {
						show: false
					},
					yaxis: {
						show: false
					},
					xaxis: {
						type: "category",
						categories: res.filter(function(x) {
							return x.currencyType == v
						}).map(function(x) {
							return x.insertDate
						}).reverse(),
						axisBorder: {
							show: false
						},
						axisTicks: {
							show: false
						},
					},
					legend: {
						show: false
					},
					tooltip: {
						theme: "dark"
					},
				};
				var chartaed = new ApexCharts(document.querySelector("#currencyChart" + v), chartaed);
				chartaed.render();
			});
		},
		error: function(r, s) {}
	});
}

function dashboard_g() {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/dashboard/v1/client/dashboard_g",
		data: {},
		type: 'get',
		success: function(res) {
			var a0, a1;
			$.each(res, function(i, v) {
				$('#dashboard [key="dashboard_' + v.key + '"]').html(v.value || '-');
				if (v.key == 'accountGoogle_0_count') a0 = (v.value || 0);
				if (v.key == 'accountGoogle_1_count') a1 = (v.value || 0);
				if (i == (res.length - 1)) {
					var options = {
						series: [getInt(a1 / (a1 + a0) * 100), getInt(a0 / (a1 + a0) * 100)],
						labels: ["فعال", "غیر فعال"],
						chart: {
							height: 200,
							type: "donut",
							fontFamily: "g",
							foreColor: "#000",
						},
						color: "#adb5bd",
						plotOptions: {
							pie: {
								donut: {
									size: '75%',
									background: 'transparent',
									labels: {
										show: true,
										name: {
											show: true,
											offsetY: 7,
										},
										value: {
											show: false,
										},
										total: {
											show: true,
											color: '#000',
											fontSize: '20px',
											fontWeight: "600",
											label: '',
										},
									},
								},
							},
						},
						stroke: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						legend: {
							show: false
						},
						colors: ["var(--bs-success)", "var(--bs-danger)"],
						tooltip: {
							theme: "dark",
							fillSeriesColor: false
						},
					};
					var chart = new ApexCharts(document.querySelector("#accountGoogleChart"), options);
					chart.render();
				}
			});
		},
		error: function(request, status) {}
	});
}

dataTable_invoices = $('#grid_invoices').DataTable({
	processing: true,
	serverSide: true,
	ordering: false,
	paging: false,
	searching: false,
	editing: true,
	pageLength: 6,
	bLengthChange: false,
	bInfo: false,
	language: {
		zeroRecords: "دیتایی برای نمایش وجود ندارد!"
	},
	createdRow: function(row, data, dataIndex) {
		$(row).attr('data-id', data.id);
		$(row).attr('data-parentid', data.parentId);
	},
	columns: [{
			sTitle: 'سفارش',
			data: "title",
			render: function(data, type, item) {
				return '<div class="d-flex align-items-center"><div class="ms-0 text-start"><h6 class="fs-3 fw-semibold mb-0"><span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="' + (item.title || '') + '">' + (item.priorityType == "M" ? '<i class="ti ti-sparkles text-info me-1"></i>' : '') + (item.title || '') + '</span></h6><span class="fw-bold ps-3">' + item.trackNo + '</span></div></div>'
			}
		},
		{
			sTitle: 'وضعیت',
			data: "invoiceStateDescription",
			render: function(data, type, item) {
				var state = _lst_invoiceState.filter(function(x) {
					return getInt(x.key) == getInt(item.invoiceState)
				})[0];
				return '<div class="d-flex align-items-center text-start"><div class="ms-0"><h6 class="fs-4 fw-semibold mb-1"><span class="badge ' + (state ? state.css : 'bg-info') + '  text-white rounded-3 fw-semibold fs-2">' + item.invoiceStateDescription + '</span></h6><span class="fw-normal"><i class="ti ti-clock"></i>' + item.modifiedDate + '</span></div></div>'
			}
		},
		{
			sTitle: 'مبلغ فاکتور',
			data: "paymentCost",
			render: function(data, type, item) {
				return numberWithCommas(item.paymentCost) + ' تومان'
			}
		}
	],
	ajax: {
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/invoice/v1/client/invoicesDashboard_g",
		type: "Post",
		dataSrc: function(json) {
			json.iTotalRecords = json.length;
			json.iTotalDisplayRecords = json.length;
			json.data = json;
			return json.data;
		},
		error: function(xhr, error, code) {}
	},
	columnDefs: [{
		targets: 0,
		searchable: true,
	}]
});


function accountsGoogle_g() {
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + 'api/account/v1/client/accountsGoogleDashboard_g',
		type: 'get',
		success: function(res) {
			$('#accountsgoogle').html('');
			$.each(res, function(i, v) {
				var html = $('#accountGoogle_template').html()
				html = html.replace(/#id#/g, v.id).replace(/#customerId#/g, v.customerId || '-').replace(/#name#/g, truncate(v.name, 20)).replace(/#currencyCode#/g, v.currencyCode);
				html = html.replace(/#accountType#/g, (v.accountType == 1) ? 'مدیریت شده' : 'اختصاصی');
				$('#accountsgoogle').append(html)
			});
		},
		error: function(r, s) {}
	});
}




function calculateGoogleAccountIranAmount_g(id, amount) {
	var agi = $('.accountGoogle_item[data-id="' + id + '"]');
	var agi_pc = agi.closest('.accountGoogle_item').find('.accountGoogle_serviceCost')
	var agi_cia = agi.closest('.accountGoogle_item').find('.accountGoogle_currencyIranAmount')
	if (!amount || amount < 10) {
		agi_pc.html('0');
		agi_cia.html('0');
		agi.find('.accountGoogle_submit').prop('disabled', true);
		return;
	}
	loading_context(agi.find('.accountGoogle_serviceCost_parent'), 1)
	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + "api/account/v1/client/accountgooglecalculatepaymentcost_g",
		data: {
			amount: amount,
			accountGoogleId: id
		},
		type: 'get',
		success: function(res) {
			loading_context(agi.find('.accountGoogle_serviceCost_parent'), 0)
			agi_pc.html(numberWithCommas(getInt(res.serviceCost)));
			agi_cia.html(numberWithCommas(getInt(res.iranAmount)));
			agi.find('.accountGoogle_submit').prop("disabled", res.serviceCost ? false : true);
		},
		error: function(request, status) {
			ajax_error2(request, status);
		}
	});
}

$(document).on('keyup touchend', '.accountGoogle_amount', function(e) {
	var _this = $(this);
	var amount = getInt(_this.val().replace(/\D/g, ''));
	_this.val(numberWithCommas(amount));
	calculateGoogleAccountIranAmount_g(_this.closest('.accountGoogle_item').attr('data-id'), amount)
});

$(document).on('click', '.accountGoogle_submit', function(e) {
	var _this = $(this);
	loading_button(_this, 1, 1);
	var id = $(this).closest('.accountGoogle_item').attr('data-id');
	var currencyCode = $(this).closest('.accountGoogle_item').attr('data-currencycode');
	var amount = getInt($(this).closest('.accountGoogle_item').find('.accountGoogle_amount').val())

	$.ajax({
		beforeSend: function(xhr) {
			bearer(xhr)
		},
		url: _bUrl + 'api/invoice/v1/client/invoiceaccountgoogle_i',
		data: JSON.stringify({
			currencyCode: currencyCode,
			refId: id,
			amount: amount,
			description: ''
		}),
		type: 'post',
		contentType: 'application/json; charset=utf-8',
		success: function(res) {
			toast(res.r_status, res.r_desc);
			setCookie('href', location.href, 10);
			setCookie('invoiceNo', res.r_invoiceNo, 10);
			setTimeout(function() {
				loading_button(_this, 0, 0);
				location.href = _fUrl + res.r_invoiceUrl;
			}, 300);
		},
		error: function(request, status) {
			loading_button(_this, 0, 0);
			ajax_error2(request, status);
		}
	});
});



function distinctArray(r, n, t) {
	var u = [],
		h = [];
	for (i = 0; i < r.length; i++) u[r[i][n]] || (u[r[i][n]] = !0, t ? h.push(r[i]) : h.push(r[i][n]));
	return h
}



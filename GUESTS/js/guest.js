$(document).on("click", ".categories li", function()
{
	var id = $(this).attr('id');
	// alert(id);
	 $.ajax
        ({
           	type: "POST",
            url: "ajax_guest.php",
            data: { type: "post_data" ,id: id},
            cache: false,
            success: function(result)
            {
            	// console.log(result);
            	var post_array = $.parseJSON(result);
            	if(post_array != null){
		             var html = '';
		            $.each(post_array, function(time,date){
		                // html+= '<tr><td class="td">'+time+'</td>';
                        $.each(date, function(div,val){
                        	html+= '<div class="col-lg-4 col-md-6 col-12 mb-4"><div class="post-entry-1 h-100"><a href="single.php?id='+val.POST_ID+'"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a><div class="post-entry-1-contents"><h2><a href="single.php?id='+val.POST_ID+'">'+val.TITLE+'</a></h2><span class="meta d-inline-block mb-3">'+val.PUBLISHED_ON+' <span class="mx-2">by</span> <a href="#">Admin</a></span><p>'+val.SUMMARY+'</p></div></div></div>';
                        });

                    });
		        }

		        $('.post_cate').html(html);
            }
        });

});


(function($) {
    var pagify = {
        items: {},
        container: null,
        totalPages: 1,
        perPage: 3,
        currentPage: 0,
        createNavigation: function() {
            this.totalPages = Math.ceil(this.items.length / this.perPage);

            $('.pagination', this.container.parent()).remove();
            var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false"><</a>');

            for (var i = 0; i < this.totalPages; i++) {
                var pageElClass = "page";
                if (!i)
                    pageElClass = "page current";
                var pageEl = '<a class="' + pageElClass + '" data-page="' + (
                i + 1) + '">' + (
                i + 1) + "</a>";
                pagination.append(pageEl);
            }
            pagination.append('<a class="nav next" data-next="true">></a>');

            this.container.after(pagination);

            var that = this;
            $(".cont").off("click", ".nav");
            this.navigator = $(".cont").on("click", ".nav", function() {
                var el = $(this);
                that.navigate(el.data("next"));
            });

            $(".cont").off("click", ".page");
            this.pageNavigator = $(".cont").on("click", ".page", function() {
                var el = $(this);
                that.goToPage(el.data("page"));
            });
        },
        navigate: function(next) {
            // default perPage to 5
            if (isNaN(next) || next === undefined) {
                next = true;
            }
            $(".pagination .nav").removeClass("disabled");
            if (next) {
                this.currentPage++;
                if (this.currentPage > (this.totalPages - 1))
                    this.currentPage = (this.totalPages - 1);
                if (this.currentPage == (this.totalPages - 1))
                    $(".pagination .nav.next").addClass("disabled");
                }
            else {
                this.currentPage--;
                if (this.currentPage < 0)
                    this.currentPage = 0;
                if (this.currentPage == 0)
                    $(".pagination .nav.prev").addClass("disabled");
                }

            this.showItems();
        },
        updateNavigation: function() {

            var pages = $(".pagination .page");
            pages.removeClass("current");
            $('.pagination .page[data-page="' + (
            this.currentPage + 1) + '"]').addClass("current");
        },
        goToPage: function(page) {

            this.currentPage = page - 1;

            $(".pagination .nav").removeClass("disabled");
            if (this.currentPage == (this.totalPages - 1))
                $(".pagination .nav.next").addClass("disabled");

            if (this.currentPage == 0)
                $(".pagination .nav.prev").addClass("disabled");
            this.showItems();
        },
        showItems: function() {
            this.items.hide();
            var base = this.perPage * this.currentPage;
            this.items.slice(base, base + this.perPage).show();

            this.updateNavigation();
        },
        init: function(container, items, perPage) {
            this.container = container;
            this.currentPage = 0;
            this.totalPages = 1;
            this.perPage = perPage;
            this.items = items;
            this.createNavigation();
            this.showItems();
        }
    };

    // stuff it all into a jQuery method!
    $.fn.pagify = function(perPage, itemSelector) {
        var el = $(this);
        var items = $(itemSelector, el);

        // default perPage to 5
        if (isNaN(perPage) || perPage === undefined) {
            perPage = 3;
        }

        // don't fire if fewer items than perPage
        if (items.length <= perPage) {
            return true;
        }

        pagify.init(el, items, perPage);
    };
})(jQuery);

$(".page_div").pagify(3, ".single-item");

var genesisMenuParams="undefined"==typeof genesis_responsive_menu?"":genesis_responsive_menu,genesisMenusUnchecked=genesisMenuParams.menuClasses,genesisMenus={},menusToCombine=[];!function(e,n,s){"use strict";n.each(genesisMenusUnchecked,function(e){genesisMenus[e]=[],n.each(this,function(s,u){var a=u,i=n(u);i.length>1?n.each(i,function(s,u){var i=a+"-"+s;n(this).addClass(i.replace(".","")),genesisMenus[e].push(i),"combine"===e&&menusToCombine.push(i)}):1==i.length&&(genesisMenus[e].push(a),"combine"===e&&menusToCombine.push(a))})}),void 0===genesisMenus.others&&(genesisMenus.others=[]),1==menusToCombine.length&&(genesisMenus.others.push(menusToCombine[0]),genesisMenus.combine=null,menusToCombine=null);var u={},a="menu-toggle",i="sub-menu-toggle",o="genesis-responsive-menu";function t(){var e=n(this),s=e.next("nav");e.attr("id","genesis-mobile-"+n(s).attr("class").match(/nav-\w*\b/))}function r(){var e=n(this);m(e,"aria-pressed"),m(e,"aria-expanded"),e.toggleClass("activated"),e.next("nav").fadeToggle("fast")}function c(){var e=n(this),s=e.closest(".menu-item").siblings();m(e,"aria-pressed"),m(e,"aria-expanded"),e.toggleClass("activated"),e.next(".sub-menu").slideToggle("fast"),s.find("."+i).removeClass("activated").attr("aria-pressed","false"),s.find(".sub-menu").slideUp("fast")}function m(e,n){e.attr(n,function(e,n){return"false"===n})}function l(e){return n.map(e,function(e,n){return e}).join(",")}function d(){var e=[];return null!==menusToCombine&&n.each(menusToCombine,function(n,s){e.push(s.valueOf())}),n.each(genesisMenus.others,function(n,s){e.push(s.valueOf())}),e.length>0?e:null}u.init=function(){if(0!=n(d()).length){var e=void 0!==genesisMenuParams.menuIconClass?genesisMenuParams.menuIconClass:"dashicons-before dashicons-menu",s=void 0!==genesisMenuParams.subMenuIconClass?genesisMenuParams.subMenuIconClass:"dashicons-before dashicons-arrow-down-alt2",u={menu:n("<button />",{class:a,"aria-expanded":!1,"aria-pressed":!1,role:"button"}).append(genesisMenuParams.mainMenu),submenu:n("<button />",{class:i,"aria-expanded":!1,"aria-pressed":!1,role:"button"}).append(n("<span />",{class:"screen-reader-text",text:genesisMenuParams.subMenu}))};n(l(genesisMenus)).addClass(o),function(e){if(n(l(genesisMenus)).find(".sub-menu").before(e.submenu),null!==menusToCombine){var s=genesisMenus.others.concat(menusToCombine[0]);n(l(s)).before(e.menu)}else n(l(genesisMenus.others)).before(e.menu)}(u),n("."+a).addClass(e),n("."+i).addClass(s),n("."+a).on("click.genesisMenu-mainbutton",r).each(t),n("."+i).on("click.genesisMenu-subbutton",c)}},n(e).ready(function(){null!==d()&&u.init()})}(document,jQuery);
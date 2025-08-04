<?php
/**
 * Add Tracking Codes to HTML head
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Add Tracking Codes to HTML head
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_tracking_to_head' ) ) :
	/**
	 * Add Tracking Codes to HTML head
	 *
     * @phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
     * @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function add_tracking_to_head(): void {
		$google_tracking_code = '<!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-4210242-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag(\'js\', new Date());
            gtag(\'config\', \'UA-4210242-1\');
        </script>
        <!-- End Google tag (gtag.js) -->';

		$facebook_tracking_code = '<!-- Facebook Analytics -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,"script",
            "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "154357088608200");
            fbq("track", "PageView");
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=154357088608200&ev=PageView&noscript=1"/></noscript>
        <!-- End Facebook Analytics -->';

		$linkedin_tracking_code = '<!-- LinkedIn Analytics -->
        <script type="text/javascript">
            _linkedin_partner_id = "794770";
            window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
            window._linkedin_data_partner_ids.push(_linkedin_partner_id);
            </script>
            <script type="text/javascript">
            (function(){var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);})();
        </script>
        <noscript><img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=794770&fmt=gif" /></noscript>
        <!-- End LinkedIn Analytics -->';

		$visual_visitor_tracking_code = '<!-- Visual Visitor Analytics -->
        <script type="text/javascript">
            var fesdpid = "Yh2v1BErUG";
            var fesdpextid = "5cab6d4f";
            var __ibaseUrl = (("https:" == document.location.protocol) ? "https://fe.sitedataprocessing.com" : "http://fe.sitedataprocessing.com");
            (function () {
                var va = document.createElement("script"); va.type = "text/javascript"; va.async = true;
                va.src = __ibaseUrl + "/cscripts/" + fesdpid + "-" + fesdpextid + ".js";
                var sv = document.getElementsByTagName("script")[0]; sv.parentNode.insertBefore(va, sv);
            })();
        </script>
        <!-- End Visual Visitor Analytics -->';

		$insightly_tracking_code = '<!-- Insightly Analytics -->
		<script type="text/javascript" async defer src="https://chloe.insightly.services/js/WY2FJN.js"></script>
		<!-- End Insightly Analytics -->';

		if ( is_user_logged_in() ) {
			echo '<!-- NOTICE: Logged in site admins are not tracked to keep from skewing their own (Google, Facebook, Insightly, LinkedIn, Visual Visitor) analytics data -->';
		} else {
			echo $google_tracking_code,
			$facebook_tracking_code,
			$linkedin_tracking_code,
			$visual_visitor_tracking_code,
			$insightly_tracking_code;
		}
	}
endif;

add_action( 'wp_head', 'CassidyWP\Banyan\add_tracking_to_head' );


<div class="compartilhe">
    <h4 class="">Gostou? Compartilhe!</h4>
    <div class="social-buttons">
        <?php
            $titulo = urlencode(get_the_title( ));
            $url = urlencode(get_the_permalink( ));
        ?>
        <ul class="bpssb-buttons">
            <li class="bpssb-facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" class="popup">
                    <span class="bpssb-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29">
                            <path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/>
                        </svg>
                    </span>
                    <span class="bpssb-text">facebook</span>
                </a>
            </li>
            <li class="bpssb-twitter">
                <a href="https://twitter.com/intent/tweet?text=<?php echo $titulo; ?> <?php echo $url; ?> <?php if (has_post_thumbnail()) echo '%20%7C%20'.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" class="popup">
                    <span class="bpssb-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                            <path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/>
                        </svg>
                    </span>
                    <span class="bpssb-text">twitter</span>
                </a>
            </li>
            <li class="bpssb-pinterest">
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo $url; if (has_post_thumbnail()) echo '&amp;media='.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>&amp;description=<?php echo $titulo; ?>" target="_blank">
                    <span class="bpssb-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                            <path d="M14.02 1.57c-7.06 0-12.784 5.723-12.784 12.785S6.96 27.14 14.02 27.14c7.062 0 12.786-5.725 12.786-12.785 0-7.06-5.724-12.785-12.785-12.785zm1.24 17.085c-1.16-.09-1.648-.666-2.558-1.22-.5 2.627-1.113 5.146-2.925 6.46-.56-3.972.822-6.952 1.462-10.117-1.094-1.84.13-5.545 2.437-4.632 2.837 1.123-2.458 6.842 1.1 7.557 3.71.744 5.226-6.44 2.924-8.775-3.324-3.374-9.677-.077-8.896 4.754.19 1.178 1.408 1.538.49 3.168-2.13-.472-2.764-2.15-2.683-4.388.132-3.662 3.292-6.227 6.46-6.582 4.008-.448 7.772 1.474 8.29 5.24.58 4.254-1.815 8.864-6.1 8.532v.003z"/>
                        </svg>
                    </span>
                    <span class="bpssb-text">pinterest</span>
                </a>
            </li>
            <li class="bpssb-whatsapp hidden-lg hidden-xl">
                <a href="https://api.whatsapp.com/send?text=<?php echo $titulo; ?> <?php echo $url; ?> <?php if (has_post_thumbnail()) echo '%20%7C%20'.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" data-action="share/whatsapp/share" target="_blank">
                    <span class="bpssb-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90">
                            <path d="M90 43.84c0 24.214-19.78 43.842-44.182 43.842a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.63 21.415 0 45.818 0 70.223 0 90 19.628 90 43.84zM45.818 6.983c-20.484 0-37.146 16.535-37.146 36.86 0 8.064 2.63 15.533 7.076 21.61l-4.64 13.688 14.274-4.537A37.122 37.122 0 0 0 45.82 80.7c20.48 0 37.145-16.533 37.145-36.857S66.3 6.983 45.818 6.983zm22.31 46.956c-.272-.447-.993-.717-2.075-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.36-1.717-.54-2.438.536-.72 1.076-2.797 3.495-3.43 4.212-.632.72-1.263.81-2.347.27-1.082-.536-4.57-1.672-8.708-5.332-3.22-2.848-5.393-6.364-6.025-7.44-.63-1.076-.066-1.657.475-2.192.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.718.182-1.345-.09-1.884-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.793-2.436-1.793-.63 0-1.353-.09-2.075-.09-.722 0-1.896.27-2.89 1.344-.99 1.077-3.788 3.677-3.788 8.964 0 5.288 3.88 10.397 4.422 11.113.54.716 7.49 11.92 18.5 16.223 11.01 4.3 11.01 2.866 12.996 2.686 1.984-.18 6.406-2.6 7.312-5.107.9-2.513.9-4.664.63-5.112z"/>
                        </svg>
                    </span>
                    <span class="bpssb-text">Whatsapp</span>
                </a>
            </li>
            <li class="bpssb-email">
                <a href="mailto:?Subject=<?php echo $titulo; ?> <?php echo $url; ?> <?php if (has_post_thumbnail()) echo '%20%7C%20'.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                    <span class="bpssb-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M21.386 2.614H2.614A2.345 2.345 0 0 0 .279 4.961l-.01 14.078a2.353 2.353 0 0 0 2.346 2.347h18.771a2.354 2.354 0 0 0 2.347-2.347V4.961a2.356 2.356 0 0 0-2.347-2.347zm0 4.694L12 13.174 2.614 7.308V4.961L12 10.827l9.386-5.866v2.347z"/>
                        </svg>
                    </span>
                    <span class="bpssb-text">email</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
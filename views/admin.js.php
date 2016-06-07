<div>
    <h2 style="font-size:30px">TuneGenie™ Site Media Player</h2>
    <h4>Add the powerful TuneGenie Media Player Bar to your website!</h4>
    <p>
    <h3>Terms</h3>
    <p>By proceeding you acknowledge and agree that (i) the TuneGenie MediaPlayer is the copyrighted property of MusicToGo, LCC (“TuneGenie”) and is subject to the terms of the Affiliation Agreement between the site operator and TuneGenie and (ii) the code and other content are otherwise subject to the <a href="http://www.tunegenie.com/page/terms-and-conditions.html" target="_blank"><b>TuneGenie Terms and Conditions</b></a> providing, among other things, that all software, text, images, graphics, user interfaces, trademarks, logos, artwork and other content, including the design, selection, arrangement and coordination of content owned, controlled or licensed by or to TuneGenie and may not be reproduced, recorded, retransmitted, sold, rented, broadcast, distributed, published, uploaded, posted, publicly displayed, altered to make new works, performed, digitized, compiled, translated or transmitted in any way to any other computer, website or other medium or for any commercial purpose without TuneGenie’s prior express written consent.</p>
    <h3>Features</h3>
    <p>Easily create remote links to place on your site that interact with the media bar. For example: <a href="https://tunegenie.zendesk.com/entries/106328873-How-to-remotely-start-the-stream-of-your-TuneGenie-MediaPlayer-Bar" target="_blank"><b>Listen Live Links</b></a> for you header that turn on the stream or <a href="https://tunegenie.zendesk.com/entries/106782603-How-to-remotely-open-your-playlist-on-your-TuneGenie-MediaPlayer-Bar" target="_blank"><b>See Our Playlist Links</b></a> and more.</p>
    <h3>TuneGenie CMS</h3>
    <p>Your TuneGenie CMS allows you to manage various features such as:</p>
    <ol>
        <li><b>Your automated concert calendar.</b> We read your playlist and create it, unique to your geo location. See more in our <a href="https://tunegenie.zendesk.com/forums/23109246-Concert-Artists" target="_blank"><b>Concert Artists Help</b></a></li>
        <li><b>Custom messages, sponsorships, push promotions.</b> Use this feature to display messages on your bar when not playing music or to activate an instant promotion. See our <a href="https://tunegenie.zendesk.com/forums/23081863-Custom-Messages" target="_blank"><b>Custom Message Help</b></a> for more information.</li>
        <li><b>Off Air Message.</b> In the event that we lose your station's stream or feed, the Off Air Message tool can be used to ensure your bar always has a message displayed. Find more information on our <a href="https://tunegenie.zendesk.com/forums/23082323-Off-Air-Message" target="_blank"><b>Off Air Message Help</b></a></li>
        <li><b>Receive your crendentials</b> by filling out our <a href="https://form.jotform.com/61525894587976" target="_blank"><b>TuneGenie CMS Access Form</b></a></li>
    </ol>
    <h3>Access Your CMS</h3>
    <p>Once you receive your credentials, you can now log into the <a href="https://tools.tunegenie.com/tools/station/" target="_blank"><b>TuneGenie CMS</b></a></p> 
    <h3>Options</h3>
    <form method="post" action="options.php" class="initial-form">
        <table border="1">
        <?php wp_nonce_field('update-options'); ?>
        <?php settings_fields('m2g_fbar_options'); ?>
            <tr class="header" style="font-size:16px">
                <th>Name</th>
                <th>Description</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Brand</td>
                <td>The call letters that appear in your station's TuneGenie url (ex. wxrv)</td>
                <td>
                    <input name="m2g_bar_brand" type="text" id="m2g_bar_brand"
                        value="<?php echo get_option('m2g_bar_brand'); ?>" />
                </td>
            </tr>
            <tr>
                <td>ZIndex</td>
                <td>The z-index your TuneGenie™ Media Player should sit on (default 5000)</td>
                <td>
                    <input name="m2g_bar_zindex" type="text" id="m2g_bar_zindex"
                        value="<?php echo get_option('m2g_bar_zindex'); ?>" />
                </td>
            </tr>
            <tr>
                <td>Theme</td>
                <td>A simple flat hex color. Pass in an array of one value, for example: [“#000000”] for black (default)</td>
                <td>
                    <input name="m2g_bar_theme" type="text" id="m2g_bar_theme"
                        value="<?php echo htmlspecialchars(get_option('m2g_bar_theme')); ?>" />
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>The position of the bar -- <b>top</b> or <b>bottom</b> -- (default <b>bottom</b>)</td>
                <td>
                    <input name="m2g_bar_position" type="text" id="m2g_bar_position"
                        value="<?php echo get_option('m2g_bar_position'); ?>" />
                </td>
            </tr>
            <tr>
                <td>iOS</td>
                <td>How to handle ios browser (don't change, unless prompted by TuneGenie)</td>
                <td>
                    <input name="m2g_bar_ios_frame" type="text" id="m2g_bar_ios_frame"
                        value="<?php echo get_option('m2g_bar_ios_frame'); ?>" />
                </td>
            </tr>
            <tr>
                <td>Debug</td>
                <td>When set to TRUE, will output debug messages to your js console (default is FALSE)</td>
                <td>
                    <select name="m2g_bar_debug">
                        <option value="true" <?php echo $this->is_debug(); ?> >True</option>
                        <option value="false" <?php echo $this->is_not_debug(); ?> >False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Autostart</td>
                <td>When set to TRUE, will start your stream once site loads (default is FALSE)</td>
                <td>
                    <select name="m2g_bar_autostart">
                        <option value="true" <?php echo $this->is_autostart(); ?> >True</option>
                        <option value="false" <?php echo $this->is_not_autostart(); ?> >False</option>
                    </select>
                </td>
            </tr>
            <tr>    
                <td>Launch Playlist Tray on Load</td>
                <td>When set to TRUE, will launch Playlist Tray once site loads (default is TRUE)</td>
                <td>
                    <select name="m2g_bar_info_tray_on_load">
                        <option value="true" <?php echo $this->is_info_tray_on_load(); ?> >True</option>
                        <option value="false" <?php echo $this->is_not_info_tray_on_load(); ?> >False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Library</td>
                <td>Enter the variable provided by TuneGenie (If variable has not been provided, leave blank)</td>
                <td>
                    <input name="m2g_bar_tgmplibs" type="text" id="m2g_bar_tgmplibs"
                        value="<?php echo htmlspecialchars(get_option('m2g_bar_tgmplibs')); ?>" />
                </td>
            </tr>
            <tr>
                <td>Trtion Player</td>
                <td>When set to TRUE, will use Trition SDK to play stream (default is FALSE)</td>
                <td>
                    <select name="m2g_bar_tritonplayer">
                        <option value="true" <?php echo $this->is_tritonplayer(); ?> >True</option>
                        <option value="false" <?php echo $this->is_not_tritonplayer(); ?> >False</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Zag Registration</td>
                <td>When set to TRUE, will prompt ZAG registration form for new listeners (default is FALSE)</td>
                <td>
                    <select name="m2g_bar_zag">
                        <option value="true" <?php echo $this->is_zag(); ?> >True</option>
                        <option value="false" <?php echo $this->is_not_zag(); ?> >False</option>
                    </select>
                </td>
            </tr>
        </table>
            <p>
                <input type="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
    </form>
</div>

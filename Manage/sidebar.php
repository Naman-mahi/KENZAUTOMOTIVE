<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu shadow-lg">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php
                $menu_items = [
                    'all' => [
                        ['url' => 'dashboard', 'icon' => 'mdi mdi-view-dashboard-outline', 'label' => 'Dashboard']
                    ],
                    'admin' => [
                        ['url' => 'CustomerManagement', 'icon' => 'mdi mdi-account-circle-outline', 'label' => 'User Management'],
                        ['url' => 'DealerManagement', 'icon' => 'mdi mdi-account-tie-outline', 'label' => 'Dealer Management'],
                        ['url' => 'CategoryManagement', 'icon' => 'mdi mdi-tag-outline', 'label' => 'Category Management'],
                        ['url' => 'BrandManagement', 'icon' => 'mdi mdi-format-list-numbered', 'label' => 'Brand Management'],
                        ['url' => 'CouponsManagement', 'icon' => 'mdi mdi-ticket-percent-outline', 'label' => 'Coupons Management'],
                        ['url' => 'SubscriptionManagement', 'icon' => 'mdi mdi-calendar-check-outline', 'label' => 'Subscriptions'],
                        ['url' => 'SalesAgentManagement', 'icon' => 'mdi mdi-account-star-outline', 'label' => 'Sales Agent'],
                        ['url' => 'WebsiteUsersManagement', 'icon' => 'mdi mdi-web', 'label' => 'Website Users'],
                        ['url' => 'ReferralManagement', 'icon' => 'mdi mdi-account-group', 'label' => 'Referral'],
                        ['url' => 'AppearanceManagement', 'icon' => 'mdi mdi-palette', 'label' => 'Appearance']
                    ],
                    'dealer' => [
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-plus-circle-outline', 'label' => 'My Products', 'submenu' => [
                            ['url' => 'MyProducts', 'label' => 'My Product'],
                            ['url' => 'MySpareParts', 'label' => 'My Spare Parts']
                        ]],
                        ['url' => 'ManageInquiry', 'icon' => 'mdi mdi-comment-question-outline', 'label' => 'Inquiry'],
                        ['url' => 'ManageOrders', 'icon' => 'mdi mdi-cart-outline', 'label' => 'My Orders'],
                        ['url' => 'ManageProductInventry', 'icon' => 'mdi mdi-cog', 'label' => 'Product Inventry']
                    ],
                    'website_user' => [
                        ['url' => 'OnboardDealer', 'icon' => 'mdi mdi-account-check-outline', 'label' => 'Onboard Dealer'],
                        ['url' => 'DealerManagement', 'icon' => 'mdi mdi-cogs', 'label' => 'Dealer Management']
                    ]
                ];

                $user_role = $_SESSION['role'];

                foreach ($menu_items['all'] as $item) {
                    echo "<li>
                        <a href=\"{$item['url']}\" class=\"waves-effect\">
                            <i class=\"{$item['icon']}\"></i>
                            <span>{$item['label']}</span>
                        </a>
                    </li>";
                }

                if (isset($menu_items[$user_role])) {
                    foreach ($menu_items[$user_role] as $item) {
                        if (isset($item['submenu'])) {
                            echo "<li>
                                <a href=\"{$item['url']}\" class=\"has-arrow waves-effect\">
                                    <i class=\"{$item['icon']}\"></i>
                                    <span>{$item['label']}</span>
                                </a>
                                <ul class=\"sub-menu\" aria-expanded=\"false\">";
                            foreach ($item['submenu'] as $subitem) {
                                echo "<li><a href=\"{$subitem['url']}\">{$subitem['label']}</a></li>";
                            }
                            echo "</ul>
                            </li>";
                        } else {
                            echo "<li>
                                <a href=\"{$item['url']}\" class=\"waves-effect\">
                                    <i class=\"{$item['icon']}\"></i>
                                    <span>{$item['label']}</span>
                                </a>
                            </li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
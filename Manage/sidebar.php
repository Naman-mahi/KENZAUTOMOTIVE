<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu shadow-lg">
    <div data-simplebar class="h-100">
        <!-- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php
                $menu_items = [
                    'all' => [
                        ['url' => 'dashboard', 'icon' => 'mdi mdi-view-dashboard-outline', 'label' => 'Dashboard']
                    ],
                    '1' => [
                        // User Management Group
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-account-multiple', 'label' => 'User Management', 'submenu' => [
                            ['url' => 'CustomerManagement', 'label' => 'Customer Management'],
                            ['url' => 'DealerManagement', 'label' => 'Dealer Management'],
                            ['url' => 'DealerOnbording', 'label' => 'Dealer Onboarding'],
                            ['url' => 'SalesAgentManagement', 'label' => 'Sales Agent'],
                            ['url' => 'WebsiteUsersManagement', 'label' => 'Website Users'],
                            ['url' => 'ReferralManagement', 'label' => 'Referrals']
                        ]],

                        // Product Management Group
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-package-variant', 'label' => 'Product Management', 'submenu' => [
                            ['url' => 'CategoryManagement', 'label' => 'Category Management'],
                            ['url' => 'BrandManagement', 'label' => 'Brand Management'],
                            ['url' => 'InspectionManagements', 'label' => 'Inspection Managements']
                        ]],

                        // Marketing Group
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-bullhorn', 'label' => 'Marketing', 'submenu' => [
                            ['url' => 'CouponsManagement', 'label' => 'Coupons Management'],
                            ['url' => 'SubscriptionManagement', 'label' => 'Subscriptions'],
                            ['url' => 'SubscriptionPlanManagement', 'label' => 'Subscription Plan'],
                            ['url' => 'AdvertisementManagement', 'label' => 'Advertisement'],
                            ['url' => 'DealerConnect', 'label' => 'Dealer Connect']
                        ]],

                        // Website Management Group
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-web', 'label' => 'Website Management', 'submenu' => [
                            ['url' => 'AppearanceManagement', 'label' => 'Appearance'],
                            ['url' => 'BannerManagement', 'label' => 'Banner']
                        ]],

                        // Access Control Group
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-shield-account', 'label' => 'Access Control', 'submenu' => [
                            ['url' => 'PermissionManagement', 'label' => 'Permission'],
                            ['url' => 'RoleManagement', 'label' => 'Role Management']
                        ]]
                    ],
                    '2' => [
                        ['url' => 'javascript: void(0);', 'icon' => 'mdi mdi-plus-circle-outline', 'label' => 'My Products', 'submenu' => [
                            ['url' => 'MyNewCars', 'label' => ' New Cars'],
                            ['url' => 'MyUsedCars', 'label' => ' Used Cars'],
                            ['url' => 'MySpareParts', 'label' => ' Spare Parts']
                        ]],
                        ['url' => 'ManageInquiry', 'icon' => 'mdi mdi-comment-question-outline', 'label' => 'Inquiry'],
                        ['url' => 'ManageOrders', 'icon' => 'mdi mdi-cart-outline', 'label' => 'My Orders'],
                        ['url' => 'AdvertisementManagement', 'icon' => 'mdi mdi-trackpad', 'label' => 'Advertisement'],
                        ['url' => 'ManageProductInventry', 'icon' => 'mdi mdi-cog', 'label' => 'Product Inventry'],
<<<<<<< HEAD
                        ['url' => 'DealerConnect', 'icon' => 'mdi mdi-handshake', 'label' => 'Dealer Connect'],
=======
                        // ['url' => 'DealerConnect', 'icon' => 'mdi mdi-handshake', 'label' => 'Dealer Connect']
>>>>>>> 147f762 (updated code)
                        ['url' => 'WebsiteSettings', 'icon' => 'mdi mdi-cog', 'label' => 'Website Settings'],
                    ],
                    '4' => [
                        ['url' => 'OnboardDealer', 'icon' => 'mdi mdi-account-check-outline', 'label' => 'Onboard Dealer'],
                        ['url' => 'DealerManagement', 'icon' => 'mdi mdi-cogs', 'label' => 'Dealer Management']
                    ]
                ];

                // Retrieve user role from session
                $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest'; // Fallback for undefined roles

                // Output menu items for all users (common items)
                foreach ($menu_items['all'] as $item) {
                    echo "<li>
                            <a href=\"{$item['url']}\" class=\"waves-effect\">
                                <i class=\"{$item['icon']}\"></i>
                                <span>{$item['label']}</span>
                            </a>
                        </li>";
                }

                // Output role-based menu items
                if (isset($menu_items[$user_role])) {
                    foreach ($menu_items[$user_role] as $item) {
                        if (isset($item['submenu'])) {
                            // Handle submenu
                            echo "<li>
                                    <a href=\"{$item['url']}\" class=\"has-arrow waves-effect\">
                                        <i class=\"{$item['icon']}\"></i>
                                        <span>{$item['label']}</span>
                                    </a>
                                    <ul class=\"sub-menu\" aria-expanded=\"false\">";
                            foreach ($item['submenu'] as $subitem) {
                                echo "<li><a href=\"{$subitem['url']}\" aria-label=\"{$subitem['label']}\">{$subitem['label']}</a></li>";
                            }
                            echo "</ul>
                                </li>";
                        } else {
                            // Simple menu item
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
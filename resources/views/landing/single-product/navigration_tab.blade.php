<div class="container">
    <div class="container">
        <div style="margin-bottom: 20px;border-radius: 20px;background: url('https://img.freepik.com/premium-photo/full-frame-shot-red-leather-background_23-2147951258.jpg');">
            <ul class="nav nav-pills nav-fill" style="margin-left: 20px;">
                @if($activeTab == 'template-overview')
                    <li class="nav-item" style="">
                        <a class="nav-link active" aria-current="page" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;background: #731515;">
                            <i class="bi bi-arrow-right" style="margin-right: 10px"></i> Template Overview
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;/* background: url('https://img.freepik.com/premium-photo/full-frame-shot-red-leather-background_23-2147951258.jpg'); */">
                            Template Overview
                        </a>
                    </li>
                @endif

                @if($activeTab == 'writing-desk')
                        <li class="nav-item" style="">
                            <a class="nav-link active" aria-current="page" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;background: #731515;">
                                <i class="bi bi-arrow-right" style="margin-right: 10px"></i> Writing Desk
                            </a>
                        </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;/* background: url('https://img.freepik.com/premium-photo/full-frame-shot-red-leather-background_23-2147951258.jpg'); */">
                            Writing Desk
                        </a>
                    </li>
                @endif

                @if($activeTab == 'checkout')
                        <li class="nav-item" style="">
                            <a class="nav-link active" aria-current="page" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;background: #731515;">
                                <i class="bi bi-arrow-right" style="margin-right: 10px"></i> Checkout
                            </a>
                        </li>
                @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;/* background: url('https://img.freepik.com/premium-photo/full-frame-shot-red-leather-background_23-2147951258.jpg'); */">
                                Checkout
                            </a>
                        </li>
                @endif

                    @if($activeTab == 'complete-order')
                        <li class="nav-item" style="">
                            <a class="nav-link active" aria-current="page" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;background: #731515;">
                                <i class="bi bi-arrow-right" style="margin-right: 10px"></i> Complete Order
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white;margin-top: 9px;margin-bottom: 9px;">Complete Order</a>
                        </li>
                    @endif


            </ul>
        </div>

    </div>

</div>

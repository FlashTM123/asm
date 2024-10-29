
<style>

    .dashboard{
        position: relative;
        left: 250px;
        background-color: var(--panel-color);
        min-height: 100vh;
        width: calc(100% - 250px);
        padding: 10px 14px;
        transition: var(--tran-05);
    }
    nav.close ~ .dashboard{
        left: 73px;
        width: calc(100% - 73px);
    }
    .dashboard .top{
        position: fixed;
        top: 0;
        left: 250px;
        display: flex;
        width: calc(100% - 250px);
        justify-content: space-between;
        align-items: center;
        padding: 10px 14px;
        background-color: var(--panel-color);
        transition: var(--tran-05);
        z-index: 10;
    }
    nav.close ~ .dashboard .top{
        left: 73px;
        width: calc(100% - 73px);
    }
    .dashboard .top .sidebar-toggle{
        font-size: 26px;
        color: var(--text-color);
        cursor: pointer;
    }
    .dashboard .top .search-box{
        position: relative;
        height: 45px;
        max-width: 600px;
        width: 100%;
        margin: 0 30px;
    }
    .top .search-box input{
        position: absolute;
        border: 1px solid var(--border-color);
        background-color: var(--panel-color);
        padding: 0 25px 0 50px;
        border-radius: 5px;
        height: 100%;
        width: 100%;
        color: var(--text-color);
        font-size: 15px;
        font-weight: 400;
        outline: none;
    }
    .top .search-box i{
        position: absolute;
        left: 15px;
        font-size: 22px;
        z-index: 10;
        top: 50%;
        transform: translateY(-50%);
        color: var(--black-light-color);
    }
    .top img{
        width: 40px;
        border-radius: 50%;
    }
    .dashboard .dash-content{
        padding-top: 50px;
    }
    .dash-content .title{
        display: flex;
        align-items: center;
        margin: 60px 0 30px 0;
    }
    .dash-content .title i{
        position: relative;
        height: 35px;
        width: 35px;
        background-color: var(--primary-color);
        border-radius: 6px;
        color: var(--title-icon-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    .dash-content .title .text{
        font-size: 24px;
        font-weight: 500;
        color: var(--text-color);
        margin-left: 10px;
    }
    .dash-content .boxes{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .dash-content .boxes .box{
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 12px;
        width: calc(100% / 3 - 15px);
        padding: 15px 20px;
        background-color: var(--box1-color);
        transition: var(--tran-05);
    }
    .boxes .box i{
        font-size: 35px;
        color: var(--text-color);
    }
    .boxes .box .text{
        white-space: nowrap;
        font-size: 18px;
        font-weight: 500;
        color: var(--text-color);
    }
    .boxes .box .number{
        font-size: 40px;
        font-weight: 500;
        color: var(--text-color);
    }
    .boxes .box.box2{
        background-color: var(--box2-color);
    }
    .boxes .box.box3{
        background-color: var(--box3-color);
    }
    .dash-content .activity .activity-data{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    .activity .activity-data{
        display: flex;
    }
    .activity-data .data{
        display: flex;
        flex-direction: column;
        margin: 0 15px;
    }
    .activity-data .data-title{
        font-size: 20px;
        font-weight: 500;
        color: var(--text-color);
    }
    .activity-data .data .data-list{
        font-size: 18px;
        font-weight: 400;
        margin-top: 20px;
        white-space: nowrap;
        color: var(--text-color);
    }

    @media (max-width: 1000px) {
        nav{
            width: 73px;
        }
        nav.close{
            width: 250px;
        }
        nav .logo_name{
            opacity: 0;
            pointer-events: none;
        }
        nav.close .logo_name{
            opacity: 1;
            pointer-events: auto;
        }
        nav li a .link-name{
            opacity: 0;
            pointer-events: none;
        }
        nav.close li a .link-name{
            opacity: 1;
            pointer-events: auto;
        }
        nav ~ .dashboard{
            left: 73px;
            width: calc(100% - 73px);
        }
        nav.close ~ .dashboard{
            left: 250px;
            width: calc(100% - 250px);
        }
        nav ~ .dashboard .top{
            left: 73px;
            width: calc(100% - 73px);
        }
        nav.close ~ .dashboard .top{
            left: 250px;
            width: calc(100% - 250px);
        }
        .activity .activity-data{
            overflow-X: scroll;
        }
    }

    @media (max-width: 780px) {
        .dash-content .boxes .box{
            width: calc(100% / 2 - 15px);
            margin-top: 15px;
        }
    }
    @media (max-width: 560px) {
        .dash-content .boxes .box{
            width: 100% ;
        }
    }
    @media (max-width: 400px) {
        nav{
            width: 0px;
        }
        nav.close{
            width: 73px;
        }
        nav .logo_name{
            opacity: 0;
            pointer-events: none;
        }
        nav.close .logo_name{
            opacity: 0;
            pointer-events: none;
        }
        nav li a .link-name{
            opacity: 0;
            pointer-events: none;
        }
        nav.close li a .link-name{
            opacity: 0;
            pointer-events: none;
        }
        nav ~ .dashboard{
            left: 0;
            width: 100%;
        }
        nav.close ~ .dashboard{
            left: 73px;
            width: calc(100% - 73px);
        }
        nav ~ .dashboard .top{
            left: 0;
            width: 100%;
        }
        nav.close ~ .dashboard .top{
            left: 0;
            width: 100%;
        }
    }
</style>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>
        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-user"></i>
                <span class="text">Total Users</span>
                <span class="number">5,120</span>
            </div>
            <div class="box box2">
                <i class="uil uil-users-alt"></i>
                <span class="text">Total Customers</span>
                <span class="number">3,420</span>
            </div>
            <div class="box box3">
                <i class="uil uil-box"></i>
                <span class="text">Total Products</span>
                <span class="number">7,300</span>
            </div>
        </div>
        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Recent Activity</span>
            </div>
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">Customer Name</span>
                    <span class="data-list">Alex Smith</span>
                    <span class="data-list">John Doe</span>
                    <span class="data-list">Jane Roe</span>
                    <span class="data-list">Alice Brown</span>
                </div>
                <div class="data email">
                    <span class="data-title">Email</span>
                    <span class="data-list">alexsmith@example.com</span>
                    <span class="data-list">johndoe@example.com</span>
                    <span class="data-list">janeroe@example.com</span>
                    <span class="data-list">alicebrown@example.com</span>
                </div>
                <div class="data joined">
                    <span class="data-title">Joined Date</span>
                    <span class="data-list">2023-03-01</span>
                    <span class="data-list">2023-03-05</span>
                    <span class="data-list">2023-03-10</span>
                    <span class="data-list">2023-03-15</span>
                </div>
                <div class="data type">
                    <span class="data-title">User Type</span>
                    <span class="data-list">Admin</span>
                    <span class="data-list">Customer</span>
                    <span class="data-list">Customer</span>
                    <span class="data-list">Admin</span>
                </div>
                <div class="data status">
                    <span class="data-title">Order Status</span>
                    <span class="data-list">Completed</span>
                    <span class="data-list">Pending</span>
                    <span class="data-list">Cancelled</span>
                    <span class="data-list">Completed</span>
                </div>
            </div>
        </div>
    </div>
</div>
